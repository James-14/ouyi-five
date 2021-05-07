<?php

namespace App\Http\Controllers;

use App\Enums\CacheConst;
use App\Enums\UserConst;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LoginController extends Controller
{

    public function getApiToken(Request $request)
    {
        if ($request['user'] != UserConst::ADMIN_USER || $request['pwd'] != UserConst::ADMIN_PWD) {
            return response()->error('1111','用户名或密码错误',200);
        }
        //生成token
        $api_token = md5(uniqid(microtime(true), true));

        //缓存token
        Cache::put(CacheConst::API_TOKEN_KEY, $api_token, CacheConst::EXPIRE_TIME_LONG);
        return response()->result(['api_token' => $api_token]);
    }


    public function logOut(Request $request)
    {
        Cache::pull(CacheConst::API_TOKEN_KEY);

        return response()->ok();
    }

}
