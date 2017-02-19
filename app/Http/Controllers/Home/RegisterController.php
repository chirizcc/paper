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
        // 查询出所有楼号，并去除重复
        $build = array_unique(DB::table('build')->pluck('build'));
        // 对楼号进行排序
        sort($build);

        return view('register.index',['build' => $build]);
    }

    public function register()
    {

    }

    public function getFloor(Request $request)
    {
        $build = $request->input('build');
        $floor = array_unique(DB::table('build')->where('build', '=', $build)->pluck('floor'));
        sort($floor);
        return $floor;
    }

    public function getRoom(Request $request)
    {
        $floor = $request->input('floor');
        $room = array_unique(DB::table('build')->where('floor', '=', $floor)->pluck('room'));
        sort($room);
        return $room;
    }
}
