<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

const ROOT_PROFILE_PAGE = 'profile.';

class ProfilController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('CheckSession');
    }

    public function index()
    {
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
        // dd(session()->get('token.access_token'));
        $responseBody = json_decode($response->getBody());
        $profile = $responseBody->profile;
        $user = $responseBody->user;

        $data = [
            'profile' => $profile,
            'user' => $user,
        ];

        return $this->__view('index', $data);
    }

    public function __view($view, $data = null)
    {
        debug($data);
        if ($data) {
            return view(ROOT_PROFILE_PAGE . $view, $data);
        } else {
            return view(ROOT_PROFILE_PAGE . $view);
        }
    }
}
