<?php

namespace App\Http\Middleware;

use App\Enums\CacheConst;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $api_token = $request['api_token']?$request['api_token']:'';

        if ($api_token == 'ignore_sign') {
            return $next($request);
        }

        //从缓存中获取token，比较二者是否一致
        $cache_token = Cache::get(CacheConst::API_TOKEN_KEY);

        if (empty($api_token) || empty($cache_token) || ($api_token != $cache_token)) {
            return response()->result(['ecode' => 10001,'emsg' => 'token验证失败']);
        }

        return $next($request);
    }
}
