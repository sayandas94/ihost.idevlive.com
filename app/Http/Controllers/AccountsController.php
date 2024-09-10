<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountsController extends Controller
{
	public function profile_data()
	{
		$profile = $this->profile();

		return response()->json($profile);
	}

	public function register(Request $request)
	{
		$url = 'accounts/register';
		$postData = [
			'email' => $request->email,
			'password' => $request->password,
			'customer_name' => $request->customer_name,
			'region' => $request->session()->get('region')
		];

		$response = $this->curl_post($url, $postData);

		if ($response->status) {
			$request->session()->put('token', $response->data->token);
		}

		return response()->json($response);
	}

	public function login(Request $request)
	{
		$url = 'accounts/login';
		$postData = [
			'email' => $request->email,
			'password' => $request->password,
			'previous_url' => $request->session()->get('previous_url')
		];

		$request->session()->forget('previous_url');

		$response = $this->curl_post($url, $postData);

		if ($response->status) {
			$request->session()->put('token', $response->data->token);
		}

		return $response;
	}

	public function logout()
	{
		$url = 'accounts/logout';

		$response = $this->curl_get_header($url);

		if (!$response->status)
		{
			return 'cant logout';
		}

		session()->forget('token');

		return redirect('sign-in');
	}

	public function active_subscriptions(Request $request)
	{
		$profile = $this->profile()->data;

		$url = 'accounts/active-subscriptions?id='. $profile->id .'&product=' . $request->product;
		$response = $this->curl_get_header($url);

		return response()->json($response);
	}

	public function fetch_address()
	{
		$profile = $this->profile()->data;
        $url = 'accounts/fetch-address?user_id=' . $profile->id;

        $address = $this->curl_get_header($url);

        return response()->json($address);
	}

	public function update_address(Request $request)
	{
		$url = 'accounts/update-address';

		$response = $this->curl_post_header($url, $request->all());
		return response()->json($response);
	}

	public function update_password(Request $request)
	{
		$url = 'accounts/update-password';

		$response = $this->curl_post_header($url, $request->all());
		return response()->json($response);
	}

	public function update_pin(Request $request)
	{
		$url = 'accounts/update-pin';

		$response = $this->curl_post_header($url, $request->all());
		return response()->json($response);
	}

	public function invoices()
	{
		$url = 'accounts/invoices';

		$response = $this->curl_get_header($url);
		return response()->json($response);
	}

	public function update_autorenew(Request $request)
	{
		// $url = 'accounts/update-autorenew?category='. $request->category .'&id='. $request->id .'&value='. $request->value;
		$url = 'accounts/update-autorenew';

		$inputData = [
			'category' => $request->category,
			'id' => $request->id,
			'value' => $request->value
		];

		$response = $this->curl_post_header($url, $inputData);
		
		return response()->json($response);
	}
}
