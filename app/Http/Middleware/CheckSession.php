<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Client;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session()->get('token.access_token') !==null){ 
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
            // dd($responseBody->profile !== null);

            if($responseBody->profile !== null){
                return $next($request);
            }else{
                return redirect()->route('login');
            }
        }else{
            return redirect()->route('login');
        }
        // return $next($request);
    }
}