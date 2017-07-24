<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\Projection;
use App\Models\Hall;
use App\Models\Film;
use App\Models\ShopDetailCopy;
use App\Models\ShopRegion;



class CinemaController extends Controller
{
    public function index()//影院列表
    {
        //获取前5条影院
        $list = Cinema::where("status",4)->limit(5)->get();
        $region=ShopRegion::where("upid",1)->get();
    
        return view("home.cinema",compact("list","region"));
    }

    public function show($cid=0)//影院详情
    {
        //获取影院
        //获取当前时间
        $time=time();
        $date1=date('m月d日',$time);
        //获取第二天的日期
        $time2=time()+24*3600;
        $date2=date('m月d日',$time2);
        $date3=date('w',$time2);
        $single = Cinema::where("id",$cid)->first();
        //获取商家id
        $firstfid = Projection::where("cid",$cid)->value("fid");
        $language=Film::where("id",$firstfid)->value("language");
        //获取商家id
        $fid = Projection::where("cid",$cid)->pluck("fid");
        
        //获取影片
        $title = Film::whereIn("id",$fid)->get();
        //获取影片名
        $title2 = Film::whereIn("id",$fid)->first();
        //获取影片id
        $filmid = Film::whereIn("id",$fid)->value("id");
        //获取语言版本

        //获取放映影片的所有时间
       // $datetime=Projection::whereIn("cid",$id)->pluck('datetime');
        $date4=date('d',$time);
        //获取日期相同的放映时间
        $date5=Projection::whereDay('datetime',$date4)->pluck('datetime');
        //获取放映信息
        $date6=[];
        foreach ($date5 as $po) {
           $date6[]=\DB::select("select * from projection where cid = '{$cid}' and fid = {$filmid} and datetime = '{$po}'");
        }
        $date7=[];
        foreach($date6 as $lo){
            foreach($lo as $ao){
                 $date7[]=$ao; 
            }
        } 

        $date8=[];
        foreach($date6 as $ho){
            foreach($ho as $ao){
                 $date8[]=$ao->hid; 
            }
        } 

       $halltitle=Hall::whereIn("id",$date8)->pluck("title");
       // echo "<pre>";
       //  print_r($date7);
       //  die();
    	return view("home.cinema_Show",compact("language","title","title2","single","date7","halltitle","price","shopid","date1","date2","date3","date5","halltitle"));

    }

    public function info($id=0,$cid=0)
    {
        //获取影院
        $sname = Cinema::where("id",$cid)->first();
        //获取影片
        $filmtitle = Film::where("id",$id)->first();
        //获取影片语言版本
        $language = Film::where("id",$id)->value("language");
       
        //获取当前时间
        $time=time();
        $date1=date('m月d日',$time);
        //获取第二天的日期
        $time2=time()+24*3600;
        $date2=date('m月d日',$time2);
        $date3=date('w',$time2);
        //查询影片id
    
        $date4=date('d',$time);
        //获取日期相同的放映时间
        $filmid = Film::where("id",$id)->value("id");
       
        $pid=Projection::where("fid",$filmid)->pluck("fid");
        $date5=Projection::whereDay('datetime',$date4)->pluck('datetime');
        $data6=[];
        foreach($date5 as $v){
           
        $date6[]=\DB::select("select * from projection where cid = {$cid} and fid = {$filmid} and datetime = '{$v}'");
       
        }
        $date7=[];
        foreach($date6 as $po){
            foreach($po as $fo){
                 $date7[]=$fo; 
            }
               

        } 
         $date8=[];
        foreach($date6 as $ho){
            foreach($ho as $ao){
                 $date8[]=$ao->hid; 
            }
               

        } 
        $halltitle=Hall::whereIn("id",$date8)->pluck("title");
        
        //获取影片价格
        $price = Projection::where("fid",$filmid)->get();

        //获取影片管理id
        $fid = Projection::where("cid",$cid)->pluck("fid");
        //放映时长
        $datetime = Projection::where("id",$id)->value("datetime");
        //影院对应影片
        $titles = Film::whereIn("id",$fid)->get();
        $a=[];
        foreach ($titles as $value) {
            $a[]=$value->id;
        }
        return view("home.info",compact("a","filmtitle","titles","sname","price","language","halltitle","date7","date1","date2","date3"));

    }
    public function date($cid=0,$id=0)
    {   
        //获取影院对应的信息
        $shop1=ShopDetailCopy::where('cid',$cid)->first();
     
       //获取当前时间
        $time=time();
        $date1=date('m月d日',$time);
        //获取第二天的日期
        $time2=time()+24*3600;
        $date2=date('m月d日',$time2);
        $date3=date('w',$time2);
        $date4=date('d',$time2);
        //获取日期相同的放映时间
     
        $date5=Projection::whereDay('datetime',$date4)->pluck('datetime');

        //获取对应的放映信息
        $date6=[];
        foreach ($date5 as $va) {
            $date6[]=\DB::select("select * from projection where cid={$cid} and fid = {$id} and datetime = '{$va}'");
        }
         
        $date7=[];
        foreach ($date6 as $po) {
            foreach ($po as $fo) {
                $date7[]=$fo;
            }
        }
        
        //获取相对应的影厅
        $date8=[];
        foreach ($date6 as $v) {
            foreach ($v as $ho) {
                $date8[]=$ho->hid;
            }
        }
        
        $hall=Hall::whereIn("id",$date8)->pluck('title');

        // echo "<pre>";
        // print_r($hall);
        // die();
        $language=Film::where("id",$id)->value('language');
       
       
        $fid = Projection::where("cid",$cid)->pluck("fid");
        //获取影片
        $title = Film::whereIn("id",$fid)->get();
      
        $title2 = Film::where("id",$id)->first(); 
      

        return view('home.date',compact('shop1','title',"date7","date1","date2","date3","title2","language","hall"));
    }
     public function indexcity($city)
    {
        
        $list=\DB::select("select * from shop_detail_copy where region = '{$city}' and status = 4");
      
        $region=ShopRegion::where("upid",1)->get();
        //echo "<pre>";print_r($list);die();
        return view("home.cinemacity",compact("list","region"));
    }
}
