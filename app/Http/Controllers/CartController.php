<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CartController extends Controller
{
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

		session()->forget('cart');

		if ($cart_contents > 0) {
			foreach ($cart_contents as $item) {
				$this->set_currency($item->currency);
				$this->insert($item);
			}
		}

		return response()->json([
			'status' => true,
			'message' => '<p>Product removed from cart.</p>',
			'data' => ['cart_url' => url('cart')]
		]);
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

	public function add_item(Request $request)
	{
		$validate_product = $this->validate_product($request->price_id);

		if ($validate_product === false) {
			return response()->json([
				'status' => false,
				'message' => 'This product can\'t be validated',
				'data' => []
			]);
		}

		$product_info = $validate_product['product_info'];
		$price_info = $validate_product['price_info'];

		# Setting the currency if not set
		$this->set_currency($price_info->currency);

		# Preparing the cart data
		# Also check for domain with same name in the cart
		if ($product_info->category == 'Domain') {
			# Check for existing domain name
			if ($this->check_existing_domain($request->domain_name)) {
				return response()->json([
					'status' => false,
					'message' => 'This domain name is already added in the cart',
					'data' => ['error' => ['This domain name is already added in the cart']]
				]);
			}

			$cart_data = $this->discounts($price_info, (object) [
				'product_id' => $product_info->product_id,
				'price_id' => $price_info->price_id,
				'region' => $price_info->region,
				'product_name' => $product_info->product_name,
				'category' => $product_info->category,
				'unit_amount' => $price_info->unit_amount,
				'duration_text' => $price_info->duration_text,
				'currency' => $price_info->currency,
				'domain_name' => $request->domain_name,
				'auto_renew' => $request->auto_renew,
				'discount_id' => $price_info->discount_id
			]);
		} else {	
			$cart_data = $this->discounts($price_info, (object) [
				'product_id' => $product_info->product_id,
				'price_id' => $price_info->price_id,
				'region' => $price_info->region,
				'product_name' => $product_info->product_name,
				'category' => $product_info->category,
				'unit_amount' => $price_info->unit_amount,
				'duration_text' => $price_info->duration_text,
				'currency' => $price_info->currency,
				'auto_renew' => $request->auto_renew,
				'discount_id' => $price_info->discount_id
			]);
		}

		if (!$this->insert($cart_data)) {
			return response()->json([
				'status' => false,
				'message' => 'Can\'t add item to the cart',
				'data' => []
			]);
		}

		return response()->json([
			'status' => true,
			'message' => '<p>Item added to the cart.</p>',
			'data' => ['url' => 'cart']
		]);
	}

	protected function validate_product($price_id)
	{
		$response = $this->curl_get('ihost/cart/product-info?id=' . $price_id);

		if ( !$response->status ) {
			return false;
		}

		$info = [
			'product_info' => $response->data->product_info,
			'price_info' => $response->data->price_info
		];

		return $info;
	}

	protected function set_currency($iso)
	{
		if (session()->get('cart.currency')) {
			return false;
		}

		$symbol = match($iso) {
			'inr' => '₹',
			'usd' => '$',
			'default' => '$'
		};

		$currency = [
			'iso' => $iso,
			'symbol' => $symbol
		];

		session()->put('cart.currency', $currency);
	}

	protected function check_existing_domain($domain_name)
	{
		if (session()->get('cart.contents')) {
			foreach (session()->get('cart.contents') as $item) {
				if (property_exists($item, 'domain_name') && $domain_name == $item->domain_name) {
					return false;
				}
			}
		}
	}

	protected function discounts($price_info, $cart_data)
	{
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

		return $cart_data;
	}

	protected function insert($cart_data)
	{
		session()->push('cart.contents', $cart_data);

		$cart_items = session()->get('cart.contents');
		
		$sub_total = [];
		$discount = [];

		foreach($cart_items as $item)
		{
			array_push($sub_total, $item->sale_price);
			array_push($discount, $item->unit_amount - $item->sale_price);
		}

		session()->put('cart.sub_total', array_sum($sub_total));
		session()->put('cart.discount', array_sum($discount));

		return true;
	}

	public function update(Request $request)
	{
		$validate_product = $this->validate_product($request->price_id);

		if ($validate_product === false) {
			return response()->json([
				'status' => false,
				'message' => 'This product can\'t be validated',
				'data' => []
			]);
		}

		$product_info = $validate_product['product_info'];
		$price_info = $validate_product['price_info'];

		if ($product_info->category == 'Domain') {
			$cart_data = $this->discounts($price_info, (object) [
				'product_id' => $product_info->product_id,
				'price_id' => $price_info->price_id,
				'region' => $price_info->region,
				'product_name' => $product_info->product_name,
				'category' => $product_info->category,
				'unit_amount' => $price_info->unit_amount,
				'duration_text' => $price_info->duration_text,
				'currency' => $price_info->currency,
				'domain_name' => $request->domain_name,
				'auto_renew' => $request->auto_renew,
				'discount_id' => $price_info->discount_id
			]);
		} else {	
			$cart_data = $this->discounts($price_info, (object) [
				'product_id' => $product_info->product_id,
				'price_id' => $price_info->price_id,
				'region' => $price_info->region,
				'product_name' => $product_info->product_name,
				'category' => $product_info->category,
				'unit_amount' => $price_info->unit_amount,
				'duration_text' => $price_info->duration_text,
				'currency' => $price_info->currency,
				'auto_renew' => $request->auto_renew,
				'discount_id' => $price_info->discount_id
			]);
		}

		$cart_contents = session()->get('cart.contents');
		array_splice($cart_contents, $request->index, 1);
		session()->forget('cart');
		array_splice($cart_contents, $request->index, 1, [$cart_data]);

		foreach ($cart_contents as $item) {
			$this->set_currency($item->currency);
			$this->insert($item);
		}

		return true;
		
	}
}
