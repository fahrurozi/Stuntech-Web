<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    public function login(Request $request)
    {
        // dd("tes");
        if (session()->get('token.access_token') !== null ) {
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
                    ]
                ]
            );
            
            $responseBody = json_decode($response->getBody());

            if ($responseBody->profile !== null) {
                return redirect()->route('home');
            } else {
                return view('auth.login');
            }
        } else {
            return view('auth.login');
        }
        // dd(session()->get('token.access_token'));
        // dd($request->session()->all());
        // dd($responseBody);

        return redirect()->route('login');
    }

    public function post_login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $client = new Client();
        $url = "http://127.0.0.1:8000/token_authentication/get_token";
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
                    'username' => $username,
                    'password' =>  $password
                ]
            ]
        );

        $responseBody = json_decode($response->getBody());
        $request->session()->put('token.access_token', $responseBody->token);

        return redirect()->route('home');
    }
}
