<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $openid = session('wechat.oauth_user')->id;

        $user = DB::table('user')->where('openid' ,'=' , $openid)->get();

        if (count($user) <= 0) {
            return redirect('home/register');
        }
//        dd($user);
        $request->session()->put('user', $user);
        return $next($request);
    }
}
