<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

const ROOT_ADMIN_PROFILE_PAGE = 'admin.profile.';

class HomeController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('CheckSession');
    }

    public function index(){

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/v1/user";
        $response = $client->request(
            'GET',
            $url,
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'token' => session()->get('token.access_token')
                ],
            ]
        );

        $responseBody = json_decode($response->getBody());
        dd($responseBody);
        return view(ROOT_ADMIN_PROFILE_PAGE.'index');
    }
}
