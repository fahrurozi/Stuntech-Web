<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;


const ROOT_PRIVACY_POLICY_PAGE = 'user.privacy-policy.';

class PrivacyPolicyController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('CheckSession');
    }

    public function index(){
        return $this->__view('index');
    }

    public function __view($view, $data = null)
    {
        if ($data) {
            return view(ROOT_PRIVACY_POLICY_PAGE . $view, $data);
        } else {
            return view(ROOT_PRIVACY_POLICY_PAGE . $view);
        }
    }


}
