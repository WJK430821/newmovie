<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use zgldh\QiniuStorage\QiniuFilesystemServiceProvider;

class AController extends Controller
{
	public function index()
	{
		return view('shop.login.a');
	}
    
     public function upload(Request $request)
    {
    	
    	$disk = \Storage::disk('qiniu');
    	$file=$request->file("file");
    	
    	//$disk=QiniuStorage::disk("qiniu");
    	$filename = md5($file->getClientOriginalName().time().rand().".".$file->getClientOriginalExtension());
    	$bool=$disk->put("upload".$filename,file_get_contents($file->getRealPath()));
    	if($bool){
    		$path=$disk->downloadUrl("upload".$filename);
    		return "上传成功,上传地址Url：".$path;
    	}
    	return "上传失败";
    }
}
