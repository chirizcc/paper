<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

use EasyWeChat\Foundation\Application;


class ActivityController extends HomeController
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->input('id');
        $data = DB::table('activity')->where('id', '=', $id)->first();
        $user = DB::table('user')->where('id', '=', $data->user_id)->first();
        $userName = $user->name;
        $roomId = $user->residents_id;

        $str = '';
        if ($user->name_look == 1) {
            $str = DB::table('residents')->where('id', '=', $roomId)->value('name') . ' ';
        }

        if ($user->room_look == 1) {
            $build = DB::table('build')->where('id', '=', $roomId)->first();
            $str .= $build->build . '#' . $build->floor . '楼';
        }

        /*$app = new Application(config('wechat'));
        $userService = $app->user;
        $user = $userService->get(DB::table('user')->where('id', '=', $data->user_id)->value('openid'));
        dd($user);*/

        $join = DB::table('join')->where('activity_id', '=', $id)->get();

        $joinUser = [];
        foreach ($join as $k => $v) {
            $jUser = DB::table('user')->where('id', '=', $v->user_id)->first();
            $Jstr = $jUser->name . ' ';
            if ($jUser->name_look == 1) {
                $Jstr .= DB::table('residents')->where('id', '=', $jUser->residents_id)->value('name') . ' ';
            }

            if ($jUser->room_look == 1) {
                $build = DB::table('build')->where('id', '=', $jUser->residents_id)->first();
                $Jstr .= $build->build . '#' . $build->floor . '楼';
            }
            $joinUser[$k] = $Jstr;
        }

        return view('home.activity.index', ['data' => $data, 'user' => ['name' => $userName, 'str' => $str], 'join' => $joinUser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('home.activity.add', ['user_id' => $request->session()->get('user')[0]->id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        try {
            $id = DB::table('activity')->insertGetId($data);
        } catch (\Exception $e) {
            return $this->errorPage(action('Home\IndexController@index'), '发起活动失败');
        }

        return $this->successPage(action('Home\ActivityController@index', ['id' => $id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function join($id)
    {
        $user_id = session('user')[0]->id;

        $join = DB::table('join')->where('activity_id', '=', $id)->where('user_id', '=', $user_id)->first();

        if (!empty($join)) {
            return $this->errorPage(action('Home\ActivityController@index', ['id' => $id]), '你已参与该活动，无法重复参与');
        }

        DB::table('join')->insert(['user_id' => $user_id, 'activity_id' => $id]);
        return $this->successPage(action('Home\ActivityController@index', ['id' => $id]));
    }
}
