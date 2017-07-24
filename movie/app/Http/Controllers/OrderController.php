<?php

namespace App\Http\Controllers;
use App\Models\Cinema;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Hall;
use App\Models\Projection;
use App\Models\Shopdetail;
use Illuminate\Support\Facades\Redis as Redis;
class OrderController extends Controller
{
	//选座
	public function choose($shopname,$key,$title)
	{
		//获取影院
		$ctit = Cinema::where("shopname", $shopname)->first();
		//获取影厅
		$hfirst = Hall::where("title", $key)->first();
		//获取影片
		$fmfirst = Film::where("title", $title)->first();
		//获取影片id
		$id = Film::where("title", $title)->value("id");
		//获取影片放映时间
		$ptime = Projection::where("fid", $id)->first();
		$layout  = $hfirst['layout'];
		$layout =json_decode($layout);
		//确认订单
		return view("home.layout",compact('fmfirst','hfirst','ctit','ptime','layout'));


	}
		public function layout($fid,$hid,$pid)
	{
		$fmfirst = Film::where('id',$fid)->first();//影片
		$hfirst = Hall::where('id',$hid)->first();//查询影厅
		$cti = Shopdetail::where('id',$hfirst->cid)->first();//查询影厅对应的影院
		$ctit = \DB::table("shop_detail_copy")->where("id",$hfirst->cid)->first();
		$ptime = Projection::where('id',$pid)->first();//放映信息

		//$layout = "{\"0\":[\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"_\",\"_\",\"a\",\"a\",\"a\",\"a\",\"a\"],\"1\":[\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"_\",\"_\",\"a\",\"a\",\"a\",\"a\",\"a\"],\"2\":[\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"_\",\"_\",\"a\",\"a\",\"a\",\"a\",\"a\"],\"3\":[\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"_\",\"_\",\"a\",\"a\",\"a\",\"a\",\"a\"],\"4\":[\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"_\",\"_\",\"a\",\"a\",\"a\",\"a\",\"a\"],\"5\":[\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"_\",\"_\",\"a\",\"a\",\"a\",\"a\",\"a\"],\"6\":[\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"_\",\"_\",\"a\",\"a\",\"a\",\"a\",\"a\"]}";
		$layout  = $hfirst['layout'];
		$layout =json_decode($layout);
		return view("home.layout",compact('fmfirst','hfirst','ctit','ptime','layout'));
	}
		//确认订单
		public function ispay()
	{
		//获取单价
		$totalprice =  session("totalprice");
		$money = \DB::table("users_detail")->where("id",session("users")->uid)->value("money");
		return view("order.isplay",compact("money"));
	}

		//确认订单
		public function orderAdd(Request $request)
	{
		/*  传递过来的参数     座位信息($_POST['seatinfo'])  放映信息($_POST['pid'])
		 *
		 * */
		//获取价格
		$totalprice = $_POST['totalprice'];
		session()->put("totalprice",$totalprice);
		//获取放映信息id
		$pid = $_POST['pid'];
		//获取座位信息
		$seatinfo = $_POST['seatinfo'];
		//获取用户uid(id)
		$uid = session("users")->uid;
		//获取影院对应cid
		$info = \DB::table("projection")->where("id",$pid)->first();
		session()->put("info",$info);
		$pid = $info->id;
		//获取影院id
		$cid = \DB::table("shop_detail")->where("id",$info->cid)->first();
		$sid = $cid->id;
		$time = strtotime($info->datetime);
		//遍历座位信息
		foreach($seatinfo as $val){
			foreach($val as $value){
				$number[] = $value;
			}
		}
		$count = count($number);
		for($v=0;$v<$count;$v+=2){
			//座位
			$seat[] = $number[$v]."排".$number[$v+1]."座";
			//key
			$num[] = $number[$v].$number[$v+1];

		}
		//将座位存入session;
		session()->put("price",count($seat));
		for($v=0;$v<count($seat);$v++){
			session()->put("seat{$v}",$seat[$v]);
		}
		$length = count($num);
		session()->put("long",count($num));
		//循环存值
		for($k=0;$k<$length;$k++){
			//判断key是否存在
			if(empty(Redis::exists($num[$k].$time))){
				//封装信息
				$arr = ["uid"=>$uid,"pid"=>$pid,"sid"=>$sid];
				//存储具体信息
				Redis::hMset($num[$k].$time,$arr);
				//设置生存时间
				Redis::expireAt($num[$k].$time,time()+60);
				//存入session
				session()->put("key{$k}",$num[$k].$time);
			}
		}

		return "1";

		//传过来参数   座位信息    uid session里面  整个场次信息
		//存哈希    座位信息 +场次信息
		//取哈希  存链表
		//选座
	}
		//支付
		public function pay(Request $request){
		//应支付
		$totalprice = $request->input("totalprice")/session("price");
		//账户余额
		$money = $request->input("money");
		//支付后余额
		$price = $request->input("money")-session("totalprice");
		//获取影片信息
		$info  = session("info");
		$length = session("long");
		for($v=0;$v<$length;$v++){
			//判断redis信息是否存在
			if(!empty(Redis::hGetall(session("key{$v}")))){
				//获取reids信息
				$list= Redis::hGetall(session("key{$v}"));
				//写入订单表
				$id = \DB::table("rel_orders")->insertGetId(["uid"=>$list["uid"],"pid"=>$list["pid"],"sid"=>$list["sid"]]);
				if($id>0){
					\DB::table("rel_orders")->where("id",$id)->update(["oid"=>$id]);
					//写入订单详情表
					\DB::table("orders")->insertGetId(["totalprice"=>$totalprice,"seat"=>session("seat{$v}"),"playtime"=>$info->datetime,"addtime"=>date("Y-m-d H:i:s",time()),"number"=>rand(10000,99999)]);
					//更新余额
					\DB::table("users_detail")->where("id",session("users")->uid)->update(["money"=>$price]);
					Redis::hDel(session("key{$v}"),session("key{$v}"));
				}
			}else{
				echo "<script>alert('您的订单已过期，请重新购买')</script>";
				echo "<script>window.location.href='/cinemas'</script>";
				return;
			}
		}
		//支付成功返回
		//return redirect("/personal");
		return view("/order/success");
	}



}
