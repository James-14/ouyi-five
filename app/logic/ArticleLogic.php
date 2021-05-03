<?php


namespace App\logic;

use App\model\Article;



class ArticleLogic
{

    public function getListForWeb()
    {
        return Article::where('created_at', '<=', date("Y-m-d H:i:s"))->limit(40)->orderBy("release_time", "desc")->get();
    }
}