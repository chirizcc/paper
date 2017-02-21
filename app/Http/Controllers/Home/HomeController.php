<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected function successPage($url, $time = 3)
    {
        return view('home.success',['url' => $url, 'time' => $time]);
    }

    protected function errorPage($url, $message = '操作失败', $time = 3)
    {
        return view('home.error', ['url' => $url, 'message' => $message, 'time' => $time]);
    }
}
