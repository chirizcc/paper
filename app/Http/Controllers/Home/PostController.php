<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class PostController extends HomeController
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->input('id');
        $data = DB::table('post')->where('id', '=', $id)->first();
        $userName = DB::table('user')->where('id', '=', $data->user_id)->value('name');
        $roomId = DB::table('user')->where('id', '=', $data->user_id)->value('residents_id');
        $build = DB::table('build')->where('id', '=', $roomId)->first();
        $buildStr = $build->build . '#' . $build->floor . '楼';
        return view('home.post.index', ['data' => $data, 'user' => ['name' => $userName, 'build' => $buildStr]]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
//        dd($request->session()->get('user')[0]->id);
        $nowSection = $request->input('section');
        $section = DB::table('section')->get();
        unset($section[0]);
        foreach ($section as $key => $value) {
            if ($value->id == $nowSection) {
                $value->status = 1;
            }
        }
        return view('home.post.add', ['section' => $section, 'user_id' => $request->session()->get('user')[0]->id]);
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
            $id = DB::table('post')->insertGetId($data);
        } catch (\Exception $e) {
            return $this->errorPage(action('Home\IndexController@index'), '发帖失败');
        }

        return $this->successPage(action('Home\PostController@index', ['id' => $id]));
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
}
