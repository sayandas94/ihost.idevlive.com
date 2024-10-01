<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HostingController extends Controller
{
    public function choose_plan(Request $request)
    {
        $url = 'ihost/hosting/choose-plan';

        $response = $this->curl_post($url, $request->all());

        return response()->json($response);

        // return response()->json($request->all());
    }

    public function setup(Request $request)
    {
        $url = 'ihost/hosting/setup';

        $response = $this->curl_post_header($url, $request->all());

        return response()->json($response);
    }

    public function details(Request $request)
    {
        $url = 'ihost/hosting/details?id='. $request->id;
        $response = $this->curl_get_header($url);

        return response()->json($response);
    }

    public function renew(Request $request)
    {
        $url = 'ihost/checkout/renew-hosting';
        $postData = [
            'id' => $request->hosting_id,
            'price' => $request->term_length,
            'payment_method' => $request->payment_method,
        ];

        $response = $this->curl_post_header($url, $postData);

        return response()->json($response);
    }
}
