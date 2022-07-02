<?php

namespace App\Http\Controllers\Main\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

const ROOT_STUNTING_INFO_PAGE = 'admin.stunting_info.';

class StuntingInfoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('CheckSession');
    }

    public function index()
    {
        $client = new Client();
        $url = getenv('API_URL')."api/v1/article";
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
                    'get_articles' => "filter_articles",
                    'article_type' => "stunting_info"
                ]
            ]
        );
        // dd(session()->get('token.access_token'));
        $responseBody = json_decode($response->getBody());
        $articles = $responseBody->articles;
        // dd($articles);
        $data = [
            'articles' => $articles,
        ];
        // dd($articles);
        return $this->__view('index', $data);
        // return view(ROOT_ADMIN_ARTICLE_PAGE . 'index', compact('articles'));
    }

    public function create()
    {
        return $this->__view('create');
    }

    public function store(Request $request)
    {
        // dd(Carbon::now()->format('Y-m-d'));
        // $opening_tag = "<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n    <meta charset=\"UTF-8\">\n    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n    <title>YAY</title>\n</head>\n <body>\n";
        // $closing_tag = "\n</body>\n</html>";
        $title = $request->title;
        $date = Carbon::now()->format('d/m/Y');
        $article_type = "stunting_info";
        $article_content = $request->article_content;
        $article_content = addslashes($article_content);
        // $article_content = $opening_tag . addslashes($article_content) . $closing_tag;
        $image = base64_encode(file_get_contents($request->file('cover')->path()));
        $client = new Client();
        $url = getenv('API_URL')."api/v1/article";
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
                    'title' => $title,
                    'date' => $date,
                    'article_content' => $article_content,
                    'article_type' => $article_type,
                    "article_sub_type" => "",
                    "article_tags" => "",
                    'cover' =>
                    array(
                        'content' => $image,
                        'extension' => $request->file('cover')->extension(),
                    )
                ]
            ]
        );
        // dd($request);
        return redirect()->route('stunting_info');
    }

    public function show($id)
    {
        $client = new Client();
        $url = getenv('API_URL')."api/v1/article";
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
                    'get_articles' => "get_by_id",
                    'id' => $id
                ]
            ]
        );

        $responseBody = json_decode($response->getBody());
        $article = $responseBody->article;
        $article_content = file_get_contents(getenv('API_URL')."static/".$article->article_file);
        $data = [
            'article' => $article,
            'article_content' => $article_content,
        ];
        // dd($data);

        return $this->__view('show', $data);
    }

    public function edit($id)
    {
        $client = new Client();
        $url = getenv('API_URL')."api/v1/article";
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
                    'get_articles' => "get_by_id",
                    'id' => $id
                ]
            ]
        );

        $responseBody = json_decode($response->getBody());
        $article = $responseBody->article;
        
        $article_content = file_get_contents(getenv('API_URL')."static/".$article->article_file);
        $data = [
            'article' => $article,
            'article_content' => $article_content,
        ];

        return $this->__view('edit', $data);
    }

    public function update(Request $request, $id){
        $title = $request->title;
        $date = Carbon::now()->format('d/m/Y');
        $article_type = "stunting_info";
        $article_content = $request->article_content;
        $article_content = addslashes($article_content);

        $article_cover_file = $request->article_cover_file;
        
        if($request->file('cover') == null){
            $image_path = getenv('API_URL')."static/".$article_cover_file;
            $image = base64_encode(file_get_contents($image_path));
            $format = pathinfo($image_path, PATHINFO_EXTENSION);
        }
        else{
            $image = base64_encode(file_get_contents($request->file('cover')->path()));
            $format = $request->file('cover')->extension();
        }
        $client = new Client();
        $url = getenv('API_URL')."api/v1/article";
        $response = $client->request(
            'PATCH',
            $url,
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'token' => session()->get('token.access_token')
                ],
                'json' => [
                    'id' => $id,
                    'title' => $title,
                    'date' => $date,
                    'article_content' => $article_content,
                    'article_type' => $article_type,
                    "article_sub_type" => "",
                    "article_tags" => "",
                    'cover' =>
                    array(
                        'content' => $image,
                        'extension' => $format,
                    )
                ]
            ]
        );

        return redirect()->route('stunting_info.show', ['id' => $id]);
    }

    public function destroy($id)
    {
        $client = new Client();
        $url = getenv('API_URL')."api/v1/article";
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
                    'to_delete_ids' => [$id],
                ]
            ]
        );

        return redirect()->route('stunting_info');
    }


    public function __view($view, $data = null)
    {
        debug($data);
        if ($data) {
            return view(ROOT_STUNTING_INFO_PAGE . $view, $data);
        } else {
            return view(ROOT_STUNTING_INFO_PAGE . $view);
        }
    }
}
