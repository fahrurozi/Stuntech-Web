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
        // e41b32e68760372d018a202a501e390431d23c3b2ee81312b2d64317a059ba6c71dba330866d37510e05d648f997d45f
        $client = new Client();
        $url = getenv('API_URL')."api/v1/article";
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

    public function create()
    {
        return view(ROOT_ADMIN_ARTICLE_PAGE.'create');
    }

    public function store(Request $request)
    {
        dd($request->editordata);
    }

    public function show($id){

    }
}
