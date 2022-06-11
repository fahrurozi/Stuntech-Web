<?php

namespace App\Http\Controllers\Main\Admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

const ROOT_ADMIN_USER_PAGE = 'admin.user.';
class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('CheckSession');
    }
    
    public function index(){
        $client = new Client();
        $url = getenv('API_URL')."api/v1/profile_admin";
        $response = $client->request(
            'GET',
            $url,
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'token' => session()->get('token.access_token')
                ],
                'json' => [
                    'get_type' => "all",
                ]
            ]
        );

        $responseBody = json_decode($response->getBody());
        $users = $responseBody->all_users;
        // dd($responseBody);
        return view(ROOT_ADMIN_USER_PAGE.'index', compact('users'));
    }
}
