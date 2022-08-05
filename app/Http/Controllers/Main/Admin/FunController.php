<?php

namespace App\Http\Controllers\Main\Admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

const ROOT_FUN_STUNTING_PAGE = 'admin.fun_stunting.';
class FunController extends Controller
{
    public function index()
    {
        return $this->__view('index');
    }

    public function list($level)
    {
        $query = '{
            "filter_type": "by_levels",
            "levels": [' . $level . '], "get_type": "qas"
        }';
        $client = new Client();
        $url = getenv('API_URL') . "api/v1/fun_stunt_user?json_body=" . $query;
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

        $data = [
            'level' => $level,
            'questions' => $responseBody->qas,
        ];

        return $this->__view('list', $data);
    }

    public function create($level)
    {
        $data = [
            'level' => $level,
        ];
        return $this->__view('create', $data);
    }

    public function store(Request $request, $level)
    {
        $level = $level;
        $question_content = $request->question_content;
        $question_content = addslashes($question_content);
        $answer_content = $request->answer_content;
        $correct_answer = $request->correct_answer;

        $client = new Client();
        $url = getenv('API_URL') . "api/v1/fun_stunt_admin";
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
                    'level' => $level,
                    'question_content' => $question_content,
                    'question_items' => '',
                    'answers_content' => array('choices' => $answer_content),
                    'correct_answer' => $correct_answer,
                ]
            ]
        );
        // dd($request);
        return redirect()->route('fun_stunting.list', $level);
    }

    public function destroy($id)
    {
        $client = new Client();
        $url = getenv('API_URL') . "api/v1/fun_stunt_admin";
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
                    'qa_id' => $id
                ]
            ]
        );
        $responseBody = json_decode($response->getBody());
        return redirect()->route(ROOT_FUN_STUNTING_PAGE . 'index');
    }

    public function __view($view, $data = null)
    {
        debug($data);
        if ($data) {
            return view(ROOT_FUN_STUNTING_PAGE . $view, $data);
        } else {
            return view(ROOT_FUN_STUNTING_PAGE . $view);
        }
    }
}
