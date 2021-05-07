<?php

namespace App\Enums;

class CacheConst
{
    //短时间缓存5分钟
    const EXPIRE_TIME_SHORT = 300;
    //稍长时间缓存2小时
    const EXPIRE_TIME_LONG = 7200;
    // 正常缓存时间1天
    const EXPIRE_TIME_NORMAL = 86400;

    //二维码图片地址
    const QRCODE_URL_KEY = "qrcode_url";

    //跳转地址
    const API_JUMP_URL = "api_jump_url";

    //api token key
    const API_TOKEN_KEY = "api_token";
}
