<?php

namespace App\Http\Controllers\Main\Admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

const ROOT_STUNTING_TRIBUTE_PAGE = 'admin.review.';

class ReviewController extends Controller
{
    //

    public function index()
    {
        $query = '{"get_type": "registered_filter_users", "location": "", "keyword": ""}';

        $client = new Client();
        $url = getenv('API_URL') . "api/v1/maps"."?json_body=".$query;
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
        // dd(session()->get('token.access_token'));
        $responseBody = json_decode($response->getBody());
        $registered_places = $responseBody->places;

        $data = [
            'registered_places' => $registered_places,
        ];

        return $this->__view('index', $data);
    }

    public function show($id){
        $query = '{"filter": {"stuntplace_id": '.$id.', "user_email": null}}';
        $client = new Client();
        $url = getenv('API_URL')."api/v1/review?json_body=".$query;
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

        $responseBodyReview = json_decode($response->getBody());

        $queryMaps = '{"get_type": "registered_filter_ids","place_ids": ['.$id.']}';
        $urlMaps = getenv('API_URL')."api/v1/maps?json_body=".$queryMaps;
        $responseMaps = $client->request(
            'GET',
            $urlMaps,
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'token' => session()->get('token.access_token')
                ]
            ]
        );

        $responseBodyMaps = json_decode($responseMaps->getBody())->registered_places[0];

        $data = [
            'review' => $responseBodyReview,
            'maps' => $responseBodyMaps,
        ];

        return $this->__view('show', $data);
    }

    public function destroy($id){
        $client = new Client();
        $url = getenv('API_URL')."api/v1/review";
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
                    'delete_type' => "id",
                    'stuntreview_id' => $id,
                ]
            ]
        );

        return redirect()->back();
    }


    public function __view($view, $data = null)
    {
        debug($data);
        if ($data) {
            return view(ROOT_STUNTING_TRIBUTE_PAGE . $view, $data);
        } else {
            return view(ROOT_STUNTING_TRIBUTE_PAGE . $view);
        }
    }
}
