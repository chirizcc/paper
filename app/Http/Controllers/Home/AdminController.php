<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class AdminController extends HomeController
{
    public function index()
    {
        return view('home.admin.index');
    }

    public function post()
    {
        $posts = DB::table('post')->orderBy('id','desc')->get();

        foreach ($posts as $key => $value) {
            $user_id = $value->user_id;
            $user_name = DB::table('user')->where('id', '=', $user_id)->value('name');
            $posts[$key]->user_name = $user_name;
        }
        return view('home.admin.post', ['posts' => $posts]);
    }

    public function delPost($id)
    {
        if(DB::table('post')->where('id', '=', $id)->delete()) {
            return $this->successPage(action('Home\AdminController@post'));
        } else {
            return $this->errorPage(action('Home\AdminController@post'), '帖子删除失败，请稍后再试');
        }
    }
}
