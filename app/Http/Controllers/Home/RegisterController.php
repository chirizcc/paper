<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
        $build = DB::table('build')->get();

        $list = [];
        foreach ($build as $key => $value) {
//            $list[$value->build][$value->floor][$value->id] = ['id' => $value->id, 'root' => $value->room];
            $list[$value->build][$value->floor][$value->id] = $value->room;
        }

        return view('register.index',['build' => json_encode($this->getPicker($list))]);
        /*// 查询出所有楼号，并去除重复
        $build = array_unique(DB::table('build')->pluck('build'));
        // 对楼号进行排序
        sort($build);

        return view('register.index',['build' => $build]);*/
    }

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
        dd($request->input());
    }
}
