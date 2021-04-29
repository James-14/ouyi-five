<?php
namespace App\Enums;

class CoinConst
{
    //['BTC', 'ETH', 'OKB', 'OKT', 'LTC','DOT']
    const BTC = 'BTC';
    const ETH = 'ETH';
    const OKB = 'OKB';
    const OKT = 'OKT';
    const LTC = 'LTC';
    const DOT = 'DOT';


    public static $coin_types = [
        self::BTC,
        self::ETH,
        self::OKB,
        self::OKT,
        self::LTC,
        self::DOT,
    ];

    //文件缓存时间，单位：分钟
    const CACHE_EPX_TIME = 10;
}
