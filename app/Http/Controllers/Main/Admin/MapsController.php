<?php

namespace App\Http\Controllers\Main\Admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

const ROOT_MAPS_PAGE = 'admin.maps.';

class MapsController extends Controller
{
    //
    public function index()
    {
        $client = new Client();
        $url = getenv('API_URL') . "api/v1/maps";
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
                    'location' => "",
                    'keyword' => "",
                ]
            ]
        );
        // dd(session()->get('token.access_token'));
        $responseBody = json_decode($response->getBody());
        $registered_places = $responseBody->places;

        $data = [
            'registered_places' => $registered_places,
        ];

        return $this->__view('index', $data);
    }

    public function create()
    {
        $client = new Client();
        $url = getenv('API_URL') . "api/v1/maps_admin";
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
                    'get_type' => "unregistered",
                    'place_query' => "Puskesmas",
                ]
            ]
        );
        // dd(session()->get('token.access_token'));
        $responseBody = json_decode($response->getBody());
        $all_places = $responseBody->all_places;

        $data = [
            'all_places' => $all_places,
        ];
        return $this->__view('add_maps', $data);
    }

    public function store($place_id)
    {
        $client = new Client();
        $url = getenv('API_URL') . "api/v1/maps_admin";
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
                    'get_type' => "unregistered",
                    'place_query' => "Rumah Sakit",
                ]
            ]
        );
        // dd(session()->get('token.access_token'));
        $responseBody = json_decode($response->getBody());
        $all_places = $responseBody->all_places;


        foreach ($all_places as $place) {
            if ($place->place_id == $place_id) {
                if(isset($place_id->static_img)){
                    if($place_id->static_img != null || $place_id->static_img =""){
                        $static_img = "";
                    }else{
                        $static_img = $place_id->static_img;
                    }
                }else{
                    $static_img = "";
                }
                $client = new Client();
                $url = getenv('API_URL') . "api/v1/maps_admin";
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
                            'all_places' => array(
                                [
                                    'location_lat' => $place->geometry->location->lat,
                                    'location_lng' => $place->geometry->location->lng,
                                    'name' => $place->name,
                                    'gmap_place_id' => $place->place_id,
                                    'img_url' => $static_img,
                                    'gmap_url' => "",
                                ]
                            ),
                        ]
                    ]
                );
            }
        }
        return redirect()->route('maps');
    }

    public function destroy($place_id){
        $client = new Client();
        $url = getenv('API_URL')."api/v1/maps_admin";
        $response = $client->request(
            'DELETE',
            $url,
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'token' => session()->get('token.access_token')
                ],
                'json' => [
                    'gmap_place_ids' => [$place_id],
                ]
            ]
        );

        return redirect()->route('maps');
    }

    public function __view($view, $data = null)
    {
        debug($data);
        if ($data) {
            return view(ROOT_MAPS_PAGE . $view, $data);
        } else {
            return view(ROOT_MAPS_PAGE . $view);
        }
    }
}
