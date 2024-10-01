<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewController extends Controller
{
	public function dashboard()
	{
		$data['profile'] = $this->profile()->data;
		return view('user.dashboard', $data);
	}

	public function domains()
	{
		$data['profile'] = $this->profile()->data;
		return view('user.domains', $data);
	}

	public function hosting()
	{
		$data['profile'] = $this->profile()->data;
		return view('user.hosting', $data);
	}

	public function emails()
	{
		$data['profile'] = $this->profile()->data;
		return view('user.emails', $data);
	}

	public function account()
	{
		$data['profile'] = $this->profile()->data;
		return view('user.account', $data);
	}

	public function billing()
	{
		$data['profile'] = $this->profile()->data;
		return view('user.billing', $data);
	}

	public function manage_domain(Request $request)
	{
		$data = [
			'domain' => $request->domain_name
		];

		return view('user.dns', $data);
	}

	public function billing_address(Request $request)
	{
		if (!$request->session()->get('cart')) {
			return redirect('cart');
		}

		return view('billing');
	}

	public function payment_method(Request $request)
	{
		if (!$request->session()->get('cart')) {
			return redirect('cart');
		}

		$profile = $this->profile()->data;
        $url = 'accounts/fetch-address?user_id=' . $profile->id;

        $address = $this->curl_get_header($url);

		switch ($address->data->country) {
			case 'India':
				$data['tax'] = number_format(($request->session()->get('cart.sub_total') * 0.18) / 100, 2, '.', '');
				break;

			case 'United States':
				$data['tax'] = 0;
			
			default:
				$data['tax'] = 0;
				break;
		}

		return view('payment', $data);
	}
}
