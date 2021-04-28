<?php


namespace App\logic;


class OkexClient
{
    public $request;

    public function __construct()
    {
        $this->request = new GuzzleHttp\Client();
    }
}