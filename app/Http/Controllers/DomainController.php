<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class DomainController extends Controller
{
	public function search(Request $request)
	{
		$url = 'ihost/domain/search';

		if (!str_contains($request->domain_name, '.')) {
			return response()->json([
				'status' => false,
				'message' => 'Invalid domain name.',
				'data' => [
					'error' => ['domain_name' => ['Please enter a valid domain name.']]
				]
			]);
		}

		# break the domain into different parts
		$domainParts = explode('.', $request->domain_name);

		# get the domain name part and remove the extension from the array
		$domain = $domainParts[0];

		# check if the domain is empty or not
		if (empty($domain)) {
			return response()->json([
				'status' => false,
				'message' => 'Invalid domain name.',
				'data' => [
					'error' => ['domain_name' => ['Please enter a valid domain name.']]
				]
			]);
		}

		# remove the domain name and keep the extension from the array
		$extension_array = array_slice($domainParts, 1);

		# join the extensions to form the tld
		$extension = '.' . implode('.', $extension_array);

		$postData = [
			'domain_name' => $request->domain_name,
			'extension' => $extension,
			'locale' => $request->locale
		];

		$response = $this->curl_post($url, $postData);

		return response()->json($response);
	}

	public function tld_info()
	{
		$tld = File::get(storage_path('tld.json'));
		// $domains = json_decode($tld);

		return response($tld);
	}

	public function domain_status(Request $request)
	{
		$url = 'ihost/domain/domain-status?domain_name='. $request->domain_name;
		$status = $this->curl_get_header($url);
		return response()->json($status);
	}

	// public function dns(Request $request)
	// {
	// 	// $customer_id = $this->profile()->data->id;
	// 	$url = 'ihost/domain/details?domain_name=' . $request->domain_name;
		
	// 	// $data = [
	// 	//     // 'profile' => $this->profile()->data,
	// 	//     // 'dns_zone_id' => $request->dns_zone_id,
	// 	//     'domain_details' => $this->curl_get_header($url)
	// 	// ];

	// 	$data = [
	// 		'domain' => $request->domain_name
	// 	];

	// 	return view('user.dns');
	// 	// return $url;
	// 	// print_r($this->curl_get_header($url));
	// }

	public function domain_details(Request $request)
	{
		$url = 'ihost/domain/details?domain_name=' . $request->domain_name;
		$details = $this->curl_get_header($url);
		return response()->json($details);
	}

	public function fetch_dns(Request $request)
	{
		$url = 'ihost/domain/fetch-dns?website_id=' . $request->website_id;
        
        $dns = $this->curl_get_header($url);

        return response()->json($dns);
	}

	public function add_dns(Request $request)
	{
		$url = 'ihost/domain/add-dns';
		
		$response = $this->curl_post_header($url, $request->all());

		return response()->json($response);
	}

	public function edit_dns(Request $request)
	{
		// $url = 'ihost/domain/edit-dns?dns_zone_id='. $request->dns_zone_id .'&dns_zone_record_id='. $request->dns_zone_record_id;
		$url = 'ihost/domain/edit-dns';
		
		$response = $this->curl_post_header($url, $request->all());

		return response()->json($response);
	}

	public function delete_dns(Request $request)
	{
		$url = 'ihost/domain/delete-dns?dns_zone_id='. $request->dns_zone_id .'&dns_zone_record_id='. $request->dns_zone_record_id;

		$response = $this->curl_get_header($url);

		return response()->json($response);
	}

	public function modify_ns(Request $request)
	{
		$url = 'ihost/domain/modify-nameservers';
		/**
		 * input data requirement
		 * 1. domain name id
		 * 2. domain name / website name
		 * 3. json encoded nameservers
		 */
		$inputData = [
			'domain_name_id' => $request->domain_name_id,
			'website_name' => $request->website_name,
			'nameservers' => json_encode($request->nameserver)
		];

		$response = $this->curl_post_header($url, $inputData);

		return response()->json($response);
	}

	public function change_privacy(Request $request)
	{
		$url = 'ihost/domain/change-privacy?domain_name_id='. $request->domain_name_id .'&value='. $request->value;
		
		$response = $this->curl_get_header($url);
		return response()->json($response);
	}

	public function domain_lock(Request $request)
	{
		$url = 'ihost/domain/domain-lock?domain_name_id='. $request->domain_name_id .'&website_name='. $request->website_name .'&value='. $request->value;

		$response = $this->curl_get_header($url);
		return response()->json($response);
	}

	public function theft_protection(Request $request)
	{
		$url = 'ihost/domain/theft-protection?domain_name_id='. $request->domain_name_id .'&website_name='. $request->website_name .'&value='. $request->value;

		$response = $this->curl_get_header($url);
		return response()->json($response);
	}

	public function add_tld(Request $request)
	{
		$url = 'ihost/domain/add-json';
		$response = $this->curl_post($url, $request->all());
		return response()->json($response);
	}
}
