<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends HomeController
{
    public function index()
    {
        //return $this->errorPage(action('Home\IndexController@index'), '注册失败');
        //dd(session('wechat.oauth_user'));
        $section = DB::table('section')->get();
//        dd($section);
        return view('home.index', ['section' => $section]);
    }
}
