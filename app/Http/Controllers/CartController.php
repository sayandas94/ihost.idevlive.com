<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CartController extends Controller
{
	public function add_item(Request $request)
	{
		$response = $this->curl_get('ihost/cart/product-info?id=' . $request->price_id);
		
		if (!$response->status) {
			return response()->json($response);
		}
		

		$product_info = $response->data->product_info;
		$price_info = $response->data->price_info;

		if (!$request->session()->get('cart.currency_iso_3')) {
			$request->session()->put('cart.currency_iso_3', $price_info->currency);
		}
		else {
			if ($request->session()->get('cart.currency_iso_3') != $price_info->currency) {
				return response()->json([
					'status' => false,
					'message' => 'There is already an item in your cart in different<br>currency. Remove that first to add this one.',
					'data' => []
				]);
			}
		}

		if ($product_info->category == 'Domain') {
			# check if the domain for the same name already exists in the cart or not
			if ($request->session()->get('cart.contents')) {
				foreach ($request->session()->get('cart.contents') as $key => $value) {
					if (property_exists($value, 'domain_name') && $request->domain_name == $value->domain_name) {
						return response()->json([
							'status' => false,
							'message' => 'This domain name is already added in the cart.',
							'data' => [
								'error' => ['This domain name is already added in the cart.']
							]
						]);
					}
				}
			}


			$cart_data = (object) [
				'price_id' => $price_info->price_id,
				'product_name' => $product_info->product_name,
				'category' => $product_info->category,
				'unit_amount' => $price_info->unit_amount,
				'duration_text' => $price_info->duration_text,
				'currency' => $price_info->currency,
				'domain_name' => $request->domain_name,
				'auto_renew' => $request->auto_renew,
				'discount_id' => $price_info->discount_id
			];
		} else {
			$cart_data = (object) [
				'price_id' => $price_info->price_id,
				'product_name' => $product_info->product_name,
				'category' => $product_info->category,
				'unit_amount' => $price_info->unit_amount,
				'duration_text' => $price_info->duration_text,
				'currency' => $price_info->currency,
				'auto_renew' => $request->auto_renew,
				'discount_id' => $price_info->discount_id
			];
		}

		if ($price_info->discount_id) {
			$cart_data->discount_info = $price_info->discount_info;
			if ($price_info->discount_type == 'percent') {
				$cart_data->sale_price = $price_info->unit_amount - ($price_info->unit_amount * ($price_info->discount_info->percent_off / 100));
			}
			
			if ($price_info->discount_type == 'amount') {
				$cart_data->sale_price = $price_info->unit_amount - $price_info->discount_info->amount_off;
			}
		} else {
			$cart_data->sale_price = $price_info->unit_amount;
		}

		$request->session()->push('cart.contents', $cart_data);
		$request->session()->push('cart.sub_total', $cart_data->sale_price);
		$request->session()->push('cart.discount', $cart_data->unit_amount - $cart_data->sale_price);

		if (!$request->session()->get('currency')) {

			switch ($price_info->currency) {
				case 'inr':
					$currency = '₹';
					break;
				case 'usd':
					$currency = '$';
					break;
				
				default:
					$currency = '$';
					break;
			}

			$request->session()->put('cart.currency', $currency);
		}

		return response()->json([
			'status' => true,
			'message' => '<p>Item added to the cart.</p>',
			'data' => ['url' => 'cart', 'response' => $response]
		]);
	}
	
	public function insert(Request $request)
	{
		$product_validation = $this->curl_get('ihost/cart/validate?id=' . $request->product_id);

		if (!$product_validation->status) {
			return response()->json($product_validation);
		}

		if ($product_validation->data->category == 'Domain') {
			$product_validation->data->domain_name = $request->domain_name;

			// YAHA PE MUJHE CHECK KARNA HAI KI DOMAIN ALREADY CART MEI EXIST KARTA HAI YA NAHI
			if ($request->session()->get('cart.contents')) {
				foreach ($request->session()->get('cart.contents') as $key => $value) {
					if ($request->domain_name == $value->domain_name) {
						return response()->json([
							'status' => false,
							'message' => 'This domain name is already added in the cart.',
							'data' => [
								'error' => ['This domain name is already added in the cart.']
							]
						]);
					}
				}
			}
		}

		$request->session()->push('cart.contents', $product_validation->data);
		$request->session()->push('cart.sub_total', $product_validation->data->after_discount);
		$request->session()->push('cart.discount', $product_validation->data->before_discount - $product_validation->data->after_discount);

		return response()->json([
			'status' => true,
			'message' => '<p>Item added to the cart.</p>',
			'data' => ['url' => 'cart']
		]);
	}

	public function remove($id = null)
	{
		if ($id == null) {
			return response()->json([
				'status' => false,
				'message' => '<p>Can\'t remove item from cart. Product ID is missing</p>',
				'data' => []
			]);
		}

		$cart_contents = session()->get('cart.contents');

		array_splice($cart_contents, $id, 1);

		session()->forget(['cart.contents', 'cart.sub_total', 'cart.discount', 'cart.currency', 'cart.currency_iso_3']);

		if (count($cart_contents) > 0) {
			session()->put('cart.contents', $cart_contents);
			session()->put('cart.currency_iso_3', $cart_contents[0]->currency);
			$this->set_currency($cart_contents[0]->currency);

			foreach ($cart_contents as $key => $value) {
				// session()->push('cart.sub_total', $value->sale_price);
				// session()->push('cart.discount', $value->unit_amount - $value->sale_price);
				session()->push('cart.sub_total', $value->sale_price);
				session()->push('cart.discount', $value->unit_amount - $value->sale_price);
			}
		}

		return response()->json([
			'status' => true,
			'message' => '<p>Product removed from cart.</p>',
			'data' => ['cart_url' => url('cart')]
		]);
	}

	private function set_currency($currency_iso_3)
	{
		switch ($currency_iso_3) {
			case 'inr':
				$currency = '₹';
				break;
			case 'usd':
				$currency = '$';
				break;
			
			default:
				$currency = '$';
				break;
		}

		session()->put('cart.currency', $currency);
	}

	public function create_invoice(Request $request)
	{
		if (!session()->get('cart.contents')) {
			return response()->json([
				'status' => false,
				'message' => 'Cart is empty.',
				'data' => []
			]);
		}

		$url = 'ihost/checkout/create-invoice';

		$postData = [
			'id' => $this->profile()->data->stripe,
			'cart_items' => json_encode($request->session()->get('cart.contents'))
		];

		$invoice_id = $this->curl_post_header($url, $postData);

		return response()->json($invoice_id);
	}

	public function deliver_products(Request $request)
	{
		$url = 'ihost/checkout/deliver-products';

		$postData = [
			'invoice_id' => $request->invoiceId,
			'cart_items' => json_encode($request->session()->get('cart.contents'))
		];

		$delivery = $this->curl_post_header($url, $postData);

		if ($delivery->status) {
			$request->session()->forget('cart');
		}

		return response()->json($delivery);
	}
}
