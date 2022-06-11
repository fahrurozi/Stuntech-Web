<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function register(){
        if (session()->get('token.access_token') !== null ) {
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
                    ]
                ]
            );
            
            $responseBody = json_decode($response->getBody());

            if ($responseBody->profile !== null) {
                return redirect()->route('home');
            } else {
                return view('auth.register');
            }
        } else {
            return view('auth.register');
        }
        return view('auth.register');
    }

    public function post_register(Request $request){
        $name = $request->name;
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
        $b64_profile_img = "iVBORw0KGgoAAAANSUhEUgAAAA4AAAANCAYAAACZ3F9/AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAAEnQAABJ0Ad5mH3gAAAAYSURBVChTY/hPJhjViAeMasQD6K3x/38AvsDVRz3BefoAAAAASUVORK5CYII=";

        $client = new Client();
        $url = getenv('API_URL')."api/v1/user";
        $response = $client->request(
            'POST',
            $url,
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'token' => session()->get('token.access_token')
                ],
                'json' => [
                    'name' => $name,
                    'b64_profile_img' => $b64_profile_img,
                    'username' => $username,
                    'password' =>  $password,
                    'email' => $email,
                    'role_name' => "admin"
                ]
            ]
        );

        return app('App\Http\Controllers\Auth\LoginController')->post_login($request);
    }
}
