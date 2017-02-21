<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class RegisterController extends HomeController
{
    public function index()
    {
        $build = DB::table('build')->get();

        $list = [];
        foreach ($build as $key => $value) {
            $list[$value->build][$value->floor][$value->id] = $value->room;
        }

        return view('home.register.index', ['build' => json_encode($this->getPicker($list))]);
    }

    /**
     *  将数组转换成微信picker组件需要的格式
     * @param array $data
     * @return array
     */
    private function getPicker($data)
    {
        $result = [];
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $result[] = ['label' => $key, 'value' => $key, 'children' => $this->getPicker($value)];
            } else {
                $result[] = ['label' => $value, 'value' => $key];
            }
        }
        return $result;
    }

    public function register(Request $request)
    {
        $data = $request->except('_token');
        $residents = DB::table('residents')->where('name', '=', trim($data['name']))->where('build_id', '=', $data['room'])->first();
        if (count($residents) <= 0) {
            return $this->errorPage(action('Home\RegisterController@index'), '该房间无此人，无法注册');
        } else {
            $user = DB::table('user')->where('name', '=', trim($data['name']))->where('residents_id', '=', $data['room'])->first();
            if (count($user) > 0) {
                return $this->errorPage(action('Home\RegisterController@index'), '该人以注册过，无法重复注册');
            } else {
                DB::table('user')->insert(
                    ['name' => trim($data['name']), 'residents_id' => $residents->id, 'openid' => session('wechat.oauth_user')->id]
                );
                return $this->successPage(action('Home\IndexController@index'));
            }

        }
    }
}
