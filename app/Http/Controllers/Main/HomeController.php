<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

const ROOT_ADMIN_DASHBOARD_PAGE = 'admin.dashboard.';

class HomeController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('CheckSession');
    }

    public function index(){
// dd(session()->get('token.access_token'));
        $client = new Client();
        $url = getenv('API_URL')."api/v1/user";
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
        // dd($responseBody);
        return view(ROOT_ADMIN_DASHBOARD_PAGE.'index');
    }
}
