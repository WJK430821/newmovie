<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ShopDetailCopy;
use App\Org\Image;

class InformationController extends Controller
{
     public function upload(Request $request)
    {
    	//获取session信息
        $li=session('sigup')->id;
        //获取影院名称
    	$shopname=$request->input("shopname");
    	//获取城市
    	$city=$request->input("city");
        $city1=\DB::table("shop_region")->where("id",$city)->value('city');
    	//获取地区
    	$region=$request->input("region");
    	//获取地址
    	$address=$request->input("address");
    	//获取电话
    	$phone=$request->input("phone");
    	//获取法人代表
    	$legal=$request->input("legal");
    	//获取身份证信息
    	$id_card=$request->input("id_card");
        //判断是否是一个有效上传文件
        if($request->file('licence') && $request->file('licence')->isValid()) {
            //获取上传文件信息
            $file = $request->file('licence');
            $ext = $file->extension(); //获取文件的扩展名
            //随机一个新的文件名
            $filename = time().rand(1000,9999).".".$ext;
            //移动上传文件
            $file->move("./upload/$li",$filename);
             Image::imageResize("$filename","./upload/$li",300,226,"b_");
            Image::imageResize("$filename","./upload/$li",240,160,"s_");
            Image::imageResize("$filename","./upload/$li",120,88,"m_");
        }

        //判断是否是一个有效上传文件
        if($request->file('picname') && $request->file('picname')->isValid()) {
            //获取上传图片
            $pic = $request->file('picname');
            $ext = $pic->extension(); //获取图片的扩展名
            //随机一个新的文件名
            $picname = time().rand(1000,9999).".".$ext;
            //移动上传文件
            $pic->move("./upload/pic/$li",$picname);
            Image::imageResize("$picname","./upload/pic/$li",300,226,"b_");
            Image::imageResize("$picname","./upload/pic/$li",240,160,"s_");
            Image::imageResize("$picname","./upload/pic/$li",120,88,"m_");
        }
        //获取session信息
        //$li=session('sigup')->id;

        $list=\DB::table("shop_detail_copy")->where('cid',$li)->update(
        	[ 'picname'=>$picname,'shopname'=>$shopname,'region'=>$region,"cid"=>$li,"phone"=>$phone,"address"=>$address,"legal"=>$legal,"id_card"=>$id_card,"city"=>$city1,"licence"=>$filename]
        	);
        if(!empty($list)){
            return redirect('/shop/information/success');
        }
    }
    public function index($id)
    {
        $list=ShopDetailCopy::where("id",$id)->first();
        return view("shop.login.information2",compact('list'));
    }
	public function edit(Request $request)
    {
    	 //获取session信息
        $li=session('adminuser')->id;
        //获取影院名称
    	$shopname=$request->input("shopname");
    	//获取城市
    	$city=$request->input("city");
        $city1=\DB::table("shop_region")->where("id",$city)->value('city');
    	//获取地区
    	$region=$request->input("region");
    	//获取地址
    	$address=$request->input("address");
    	//获取电话
    	$phone=$request->input("phone");
    	//获取法人代表
    	$legal=$request->input("legal");
    	//获取身份证信息
    	$id_card=$request->input("id_card");
        //判断是否是一个有效上传文件
        if($request->file('licence') && $request->file('licence')->isValid()) {
            //获取上传文件信息
            $file = $request->file('licence');
            $ext = $file->extension(); //获取文件的扩展名
            //随机一个新的文件名
            $filename = time().rand(1000,9999).".".$ext;
            //移动上传文件
            $file->move("./upload/$li",$filename);
            Image::imageResize("$filename","./upload/$li",300,226,"b_");
            Image::imageResize("$filename","./upload/$li",240,160,"s_");
            Image::imageResize("$filename","./upload/$li",120,88,"m_");
            
        }

        //判断是否是一个有效上传文件
        if($request->file('picname') && $request->file('picname')->isValid()) {
            //获取上传图片
            $pic = $request->file('picname');
            $ext = $pic->extension(); //获取图片的扩展名
            //随机一个新的文件名
            $picname = time().rand(1000,9999).".".$ext;
            //移动上传文件
            $pic->move("./upload/pic/$li",$picname);
            Image::imageResize("$picname","./upload/pic/$li",300,226,"b_");
            Image::imageResize("$picname","./upload/pic/$li",240,160,"s_");
            Image::imageResize("$picname","./upload/pic/$li",120,88,"m_");
            
        }
       

        $list=\DB::table("shop_detail_copy")->where('cid',$li)->update(
        	[ 'picname'=>$picname,'shopname'=>$shopname,'region'=>$region,"cid"=>$li,"phone"=>$phone,"address"=>$address,"legal"=>$legal,"id_card"=>$id_card,"city"=>$city1,"licence"=>$filename]
        	);
        if(!empty($list)){
            return redirect('/shop');
        }
    }

    public function success()
    {
        return view("shop.login.success");
    }
   
}
