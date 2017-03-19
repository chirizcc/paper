<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class IndexController extends HomeController
{
    public function index()
    {
//        return $this->errorPage(action('Home\IndexController@index'), '该用户已注册过，无法重复注册');
        //dd(session('wechat.oauth_user'));
        $section = DB::table('section')->get();
//        dd($section);
        return view('home.index', ['section' => $section]);
    }

    public function user()
    {
        $user = session()->get('user')[0];
        $resident = DB::table('residents')->where('id', '=', $user->residents_id)->first();
        $build = DB::table('build')->where('id', '=', $resident->build_id)->first();
        $room = $build->build . '#' . $build->floor . '楼'.$build->room;
        $user->trueName = $resident->name;
        $user->room = $room;
        return view('home.user.index', ['user' => $user]);
    }

    public function changRoomLook()
    {
        $data = Input::except('_token');
        if($data['value'] == 0) {
            $value = 1;
        } else {
            $value = 0;
        }

        DB::table('user')
            ->where('id', $data['id'])
            ->update(['room_look' => $value]);
    }

    public function changNameLook()
    {
        $data = Input::except('_token');
        if($data['value'] == 0) {
            $value = 1;
        } else {
            $value = 0;
        }

        DB::table('user')
            ->where('id', $data['id'])
            ->update(['name_look' => $value]);
    }
}
