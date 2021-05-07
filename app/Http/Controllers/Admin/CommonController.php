<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\logic\ActivityLogic;
use Illuminate\Http\Request;
use App\Enums\CacheConst;
use Illuminate\Support\Facades\Cache;

class CommonController extends Controller
{

    public function upload(Request $request)
    {
        if($request->hasFile('file')&&$request->file('file')->isValid()){
            $file=$request->file('file');
            $allowed_extensions = ["png", "jpg", "gif"];
            if (!in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
                dd('只能上传png,jpg和gif格式的图片.');
            }else{
                $destinationPath = 'uploads/'; //public 文件夹下面建 storage/uploads 文件夹
                $extension = $file->getClientOriginalExtension();
                $fileName=md5(time().rand(1,1000)).'.'.$extension;
                $file->move($destinationPath,$fileName);
                $filePath = asset($destinationPath.$fileName);
                return response()->result(['filepath' => $filePath]);
            }
        }else{
            dd('图片上传失败请重试.');
        }
    }

    public function advertising(Request $request){
        //        Cache::forever(CacheConst::QRCODE_URL_KEY, "https://www.baidu.com/img/flexible/logo/pc/result.png");
//        Cache::forever(CacheConst::API_JUMP_URL, 'https://www.baidu.com');
        $qrCodeUrl=Cache::get(CacheConst::QRCODE_URL_KEY);
        $downloadUrl=Cache::get(CacheConst::API_JUMP_URL);
        $res = [
            'qrcode' => $qrCodeUrl==null?'':$qrCodeUrl,
            'jump_url' => $downloadUrl==null?'':$downloadUrl,
        ];
        return response()->result($res);
    }

    public function modifyAdvertising(Request $request){
        $this->validate($request,[
            'qrcodeUrl' => 'required|max:5',
            'downloadUrl' => 'required|max:5',
        ]);

        Cache::forever(CacheConst::QRCODE_URL_KEY, $request['qrcodeUrl']);
       Cache::forever(CacheConst::API_JUMP_URL, $request['downloadUrl']);
        
        return response()->ok();
    }



}
