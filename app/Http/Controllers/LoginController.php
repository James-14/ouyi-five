<?php

namespace App\Http\Controllers;

use App\Enums\UserConst;
use App\Http\Controllers\Controller;
use App\logic\ActivityLogic;
use Illuminate\Http\Request;

use App\Http\Requests;

class LoginController extends Controller
{

    public function getApiToken(Request $request)
    {
        if ($request['user'] != UserConst::ADMIN_USER || $request['pwd'] != UserConst::ADMIN_PWD) {
            return response()->result(['emsg' => '用户名or密码错误']);
        }
        //生成token
        $api_token = md5(uniqid(microtime(true), true));
        return response()->result(['api_token' => $api_token]);
    }
}
