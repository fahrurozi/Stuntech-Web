<?php

namespace App\Http\Controllers\Main\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

const ROOT_NUTRITION_INFO_PAGE = 'admin.nutrition_info.';

class NutritionInfoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('CheckSession');
    }

    public function index(){
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
                    'get_articles' => "filter_articles",
                    'article_type' => "nutrition_info"
                ]
            ]
        );
        // dd(session()->get('token.access_token'));
        $responseBody = json_decode($response->getBody());
        $articles = $responseBody->articles;

        $data = [
            'articles' => $articles,
        ];

        return $this->__view('index', $data);
    }

    public function create(){
        return $this->__view('create');
    }

    public function store(Request $request){
        $title = $request->title;
        $date = Carbon::now()->format('d/m/Y');
        $article_content = "";
        $article_type = "nutrition_info";
        $article_sub_type = "";
        $article_tags = implode('|',$request->tags_list);
        $image = base64_encode(file_get_contents($request->file('cover')->path()));
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/v1/article";
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
                    "article_sub_type" => $article_sub_type,
                    "article_tags" => $article_tags,
                    'cover' =>
                    array(
                        'content' => $image,
                        'extension' => $request->file('cover')->extension(),
                    )
                ]
            ]
        );
        return redirect()->route('nutrition_info');
    }

    public function show($id)
    {
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
                    'get_articles' => "get_by_id",
                    'id' => $id
                ]
            ]
        );

        $responseBody = json_decode($response->getBody());
        $article = $responseBody->article;
        // $article_content = file_get_contents(getenv('API_URL')."static/".$article->article_file);
        $data = [
            'article' => $article,
            // 'article_content' => $article_content,
        ];

        return $this->__view('show', $data);
    }

    public function edit($id)
    {
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
                    'get_articles' => "get_by_id",
                    'id' => $id
                ]
            ]
        );

        $responseBody = json_decode($response->getBody());
        $article = $responseBody->article;
        
        // $article_content = file_get_contents(getenv('API_URL')."static/".$article->article_file);
        $article_tags = explode("|",$article->article_tags);
        // dd();
        $data = [
            'article' => $article,
            'article_tags' => $article_tags,
            // 'article_content' => $article_content,
        ];

        return $this->__view('edit', $data);
    }

    public function update(Request $request, $id){
        $title = $request->title;
        $date = Carbon::now()->format('d/m/Y');
        $article_type = "nutrition_info";
        $article_content = "";
        $article_sub_type = "";
        $article_tags = implode('|',$request->tags_list);
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
        $url = "http://127.0.0.1:8000/api/v1/article";
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
                    "article_sub_type" => $article_sub_type,
                    "article_tags" => $article_tags,
                    'cover' =>
                    array(
                        'content' => $image,
                        'extension' => $format,
                    )
                ]
            ]
        );

        return redirect()->route('nutrition_info.show', $id);
    }

    public function destroy($id){
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/v1/article";
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

        return redirect()->route('nutrition_info');
    }

    public function __view($view, $data = null)
    {
        debug($data);
        if ($data) {
            return view(ROOT_NUTRITION_INFO_PAGE . $view, $data);
        } else {
            return view(ROOT_NUTRITION_INFO_PAGE . $view);
        }
    }
}
