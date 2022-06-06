<?php

namespace App\Http\Controllers\Main\Admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;


const ROOT_ADMIN_ARTICLE_PAGE = 'admin.article.';

class ArticleController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('CheckSession');
    }

    public function index()
    {
        // dd(session()->get('token.access_token'));
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/v1/article";
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
                    'get_articles' => "all",
                ]
            ]
        );

        $responseBody = json_decode($response->getBody());
        $articles = $responseBody->all_articles;
        // dd($articles);
        return view(ROOT_ADMIN_ARTICLE_PAGE.'index', compact('articles'));
    }
}
