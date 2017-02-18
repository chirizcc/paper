<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use EasyWeChat\Foundation\Application;

class MenuController extends Controller
{
    public function setMenu()
    {
        $app = new Application(config('wechat'));
        $menu = $app->menu;

        $buttons = [
            [
                "type" => "view",
                "name" => "进入论坛",
                "url"  => action('Home\IndexController@index'),
            ]
        ];

        $menu->add($buttons);
    }
}
