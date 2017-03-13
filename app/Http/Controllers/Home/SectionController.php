<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class SectionController extends HomeController
{
    public function index($id)
    {
        $section = DB::table('section')->where('id', '=', $id)->first();
        if (empty($section)) {
            return $this->errorPage(action('Home\IndexController@index'), '没有该版块');
        }

        if ($id == 1) {
            $data = DB::table('post')->orderBy('id', 'desc')->get();
        } else {
            $data = DB::table('post')->where('section_id', '=', $id)->get();
        }
//        dd($data);

        return view('home.section', ['section' => $section, 'data' => $data]);
    }
}
