<?php

namespace App\Http\Controllers\Main\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

const ROOT_FOOD_HELP_PAGE = 'admin.food_help.';

class FoodHelpController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('CheckSession');
    }

    public function index()
    {
        $client = new Client();
        $url = getenv('API_URL') . "api/v1/article";
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
                    'article_type' => "food_help"
                ]
            ]
        );
        
        $responseBody = json_decode($response->getBody());
        $locations = $responseBody->articles;

        $data = [
            'locations' => $locations,
        ];

        return $this->__view('index', $data);
    }

    public function create(){
        return $this->__view('create');
    }

    public function store(Request $request){
        $title = $request->title;
        $date = Carbon::now()->format('d/m/Y');
        $article_content = $request->article_content;
        $article_type = "food_help";
        $article_sub_type = $request->article_sub_type;
        $article_tags = "";
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
                    'article_items' => "",
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
        return redirect()->route('food_help');
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
        
        // $article_content = file_get_contents(getenv('API_URL')."static/".$article->article_file);
        $article_tags = explode("|",$article->article_tags);
        $article_content = file_get_contents(getenv('API_URL')."static/".$article->article_file);
        // dd();
        $data = [
            'article' => $article,
            'article_tags' => $article_tags,
            'article_content' => $article_content,
            // 'article_content' => $article_content,
        ];

        return $this->__view('edit', $data);
    }

    public function update(Request $request, $id){
        $title = $request->title;
        $date = Carbon::now()->format('d/m/Y');
        $article_content = $request->article_content;
        $article_type = "food_help";
        $article_sub_type = $request->article_sub_type;
        $article_tags = "";
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
                    'article_items' => "",
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

        return redirect()->route('food_help.show', $id);
    }

    public function destroy($id){
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

        return redirect()->route('food_help');
    }

    public function __view($view, $data = null)
    {
        debug($data);
        if ($data) {
            return view(ROOT_FOOD_HELP_PAGE . $view, $data);
        } else {
            return view(ROOT_FOOD_HELP_PAGE . $view);
        }
    }
}
