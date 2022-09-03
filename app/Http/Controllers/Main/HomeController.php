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
        // $client = new Client();
        // $url = getenv('API_URL')."api/v1/user";
        // $response = $client->request(
        //     'GET',
        //     $url,
        //     [
        //         'headers' => [
        //             'Accept' => 'application/json',
        //             'Content-Type' => 'application/json',
        //             'token' => session()->get('token.access_token')
        //         ],
        //     ]
        // );



        // $responseBody = json_decode($response->getBody());
        // dd($responseBody);

        $client = new Client();
        $url = getenv('API_URL')."api/v1/data_stats";
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
        $dataPie = get_object_vars($responseBody->growth_group_count);
        $totaldataPie = $responseBody->growth_group_total;
        // gettype
        foreach($dataPie as $key => $value){
            $tmp = $value/$totaldataPie*100;
            $dataPie[$key] = round($tmp, 2);
        }
        $pie = [
            'total' => $totaldataPie,
            'dataPie' => get_object_vars($responseBody->growth_group_count),
            'dataPiePercent' => $dataPie,
        ];

        $data = [
            'data' => $responseBody,
            'pie' => $pie,
        ];
        
        return $this->__view('index', $data);
    }

    public function __view($view, $data = null)
    {
        debug($data);
        if ($data) {
            return view(ROOT_ADMIN_DASHBOARD_PAGE . $view, $data);
        } else {
            return view(ROOT_ADMIN_DASHBOARD_PAGE . $view);
        }
    }
}
