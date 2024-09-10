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
}
