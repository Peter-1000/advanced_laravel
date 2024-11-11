<?php

namespace App\Http\Controllers\Api;


use Illuminate\Support\Facades\Http;

class ThirdPartyController extends BaseController
{

    public function getData()
    {
        $response = Http::get('https://rapidapi.com/blog/api-testing');
        return $this->sendResponse($response);
    }


}
