<?php 
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        response()->macro('result', function($data) 
        {
            // if(!$data){
            //     if($data = [];  
            // } 
            $result=[];
            $result['ecode'] = 0;
            $result['data'] = $data;
            return response()->json($result,200,
                array('Content-Type'=>'application/json;charset=utf-8'),
                JSON_UNESCAPED_UNICODE);
        });

        response()->macro('error', function($errorCode, $errorMessage,$stateCode=400) 
        {
            $errorCode=(int)$errorCode;
            return response()->json(['ecode'=>$errorCode, 'emsg'=>$errorMessage], $stateCode,
                array('Content-Type'=>'application/json;charset=utf-8'),
                JSON_UNESCAPED_UNICODE);
        });

        response()->macro('cnjson',function($data){
            return response()->json($data, 200,
                array('Content-Type'=>'application/json;charset=utf-8'),
                JSON_UNESCAPED_UNICODE);
        });

        response()->macro('ok',function(){
            return response()->json(['ecode'=>0], 200,
                array('Content-Type'=>'application/json;charset=utf-8'),
                JSON_UNESCAPED_UNICODE);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
