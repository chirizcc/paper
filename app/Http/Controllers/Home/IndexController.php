<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends HomeController
{
    public function index()
    {
        //return $this->errorPage(action('Home\IndexController@index'), '注册失败');
        //dd(session('wechat.oauth_user'));
        return view('home.index');
    }
}
