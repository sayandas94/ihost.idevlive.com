<?php

namespace App\Http\Controllers;

abstract class Controller
{
	public function curl_get($url)
	{
		$curl = curl_init(env('API_URL') . $url);

		curl_setopt_array($curl, [
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HTTPHEADER => [
				'Content-Type: application/json'
			]
		]);

		$response = curl_exec($curl);

		curl_close($curl);

		$response = json_decode($response);

		return $response;
	}

	public function curl_get_header($url)
	{
		$curl = curl_init(env('API_URL') . $url);

		curl_setopt_array($curl, [
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HTTPHEADER => [
				'Content-Type: application/json',
				'Authorization: Bearer ' . session()->get('token')
			]
		]);

		$response = curl_exec($curl);

		curl_close($curl);

		$response = json_decode($response);

		return $response;
	}

	public function curl_post($url, $postData)
	{
		$curl = curl_init(env('API_URL') . $url);

		curl_setopt_array($curl, [
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $postData
		]);

		$response = curl_exec($curl);

		curl_close($curl);

		$response = json_decode($response);

		return $response;
	}

	public function curl_post_header($url, $postData)
	{
		$curl = curl_init(env('API_URL') . $url);

		curl_setopt_array($curl, [
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POST => true,
			CURLOPT_HTTPHEADER => ['Authorization: Bearer ' . session()->get('token')],
			CURLOPT_POSTFIELDS => $postData
		]);

		$response = curl_exec($curl);

		curl_close($curl);

		$response = json_decode($response);

		return $response;
	}

	public function profile()
	{
		$curl = curl_init(env('API_URL') . 'accounts/profile');

        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . session()->get('token')
            ]
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response);

        return $response;
	}
}
