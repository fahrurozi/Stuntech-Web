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
            $statuscode = $response->getStatusCode();
            
            $responseBody = json_decode($response->getBody());
            if(isset($responseBody->profile) && $responseBody->profile !== null){
                return $next($request);
            }else{
                return redirect()->route('login');
            }
        }else{
            return redirect()->route('login');
        }
    }
}
