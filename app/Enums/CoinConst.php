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
    const DOGE = 'DOGE';

    const COIN_SUFFIX = 'USDT';


    public static $coin_types = [
        self::BTC,
        self::ETH,
        self::OKB,
        self::OKT,
        self::LTC,
        self::DOT,
        self::DOGE,
    ];
}
