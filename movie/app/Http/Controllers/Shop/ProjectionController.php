<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Projection;
use App\Models\Film;
use App\Models\Hall;
use Illuminate\Validation\Rule;

class ProjectionController extends Controller
{
	
	public function index(Request $request)
	{
		//获取登录商家的id	
		$id=session("adminuser")->id;

		//获取放映信息
		$list=Projection::where("cid",$id)->get();

		
		//获取放映影片对应id
		$filmid=Projection::where("cid",$id)->pluck('fid');
		
		//获取影厅影片
		$fo=[];
		foreach($filmid as $film){
			$fo[]=Film::where("id",$film)->value("title");
			
		}
		//获取影片类型
		$fid=[];
		foreach($filmid as $fidl){
			$fid[]=Film::where("id",$fidl)->value("fid");
			
		}
		//获取语言版本
		$language=[];
		foreach($filmid as $lang){
			$language[]=Film::where("id",$lang)->value("language");
			
		}
		// echo"<pre>";
		// print_r($fid);
		// die();
		//获取放映影厅对应id
		$hallid=Projection::where("cid",$id)->pluck('hid');

		//获取影厅信息
		$ho=[];
		foreach($hallid as $hall){
			$ho[]=Hall::where("id",$hall)->value("title");
		}



		//加载视图
		return view("shop.projection.index",compact("list","fo","ho","fid","language","seek"));
	}

	public function edit(Request $Request,$id)
	{
		//获取该影片
		$prolist=Projection::where("id",$id)->first();
		
		//获取影片所有的影片
		$film=Film::where("status",2)->get();
		
		//获取用户拥有的所有影厅
		$session=session("adminuser")->id;
		$halist=Hall::where("cid",$session)->get();
	
		return view("shop.projection.edit",compact("prolist","film","halist"));
	}
	public function update(Request $request,$id)
	{

		$cid=session('adminuser')->id;
		//获取修改后的影片信息
		$film=$request->input("film");
			
		//获取修改后影片在影片信息中对应的id
		$fid=Film::where("title",$film)->value("id");

		//获取放映时间
		$datetime=$request->input("datetime");
		//获取影片价钱
		$price=$request->input("price");
		//获取座位信息
		$seatinfo=$request->input("seatinfo");
		$id=Projection::where("id",$id)->update(
			['fid'=>$fid,"datetime"=>$datetime,"price"=>$price,"seatinfo"=>$seatinfo]
			);
		return redirect("shop/projection");

	}

	public function create()
	{
		$id=session('adminuser')->id;
		//获取影厅信息
		$hall=Hall::where("cid",$id)->get();
		//获取影片信息
		$film=Film::where("status",2)->get();
		
		return view("shop.projection.create",compact("hall","film"));
		
	}

	public function store(Request $request)
	{
		$cid=session('adminuser')->id;
		// $this->validate($request, [
  //           'endtime' => Rule::unique('hall')->where("cid",$cid),
  //       ]);

		//获取影厅信息
		$hall=$request->input("hall");
		$hallall=\DB::select("select id from hall where title=? and cid=?",[$hall,$cid]);
		foreach($hallall as $vo){
			$hid=$vo->id;
		}
		//获取影片信息
		$film=$request->input("film");
		$fid=Film::where("title",$film)->value("id");
		//获取放映时间
		$datetime=$request->input("datetime");
		//获取结束时间
		$endtime=$request->input("endtime");
		//获取座位数量
		$seatinfo=$request->input("seatinfo");
		//获取票价
		$price=$request->input("price");

		$list=Projection::insertGetId(
			["fid"=>$fid,"cid"=>$cid,"hid"=>$hid,"datetime"=>$datetime,"endtime"=>$endtime,"seatinfo"=>$seatinfo,"price"=>$price]
			);
		 //添加判断
		if($list>0){
            $info = "影片信息添加成功";
        }else{
            $info = "影片信息添加失败";
        }
        return redirect("shop/projection")->with("err",$info);
		
	}
}