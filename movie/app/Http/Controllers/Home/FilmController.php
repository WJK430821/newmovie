<?php

namespace App\Http\Controllers\Home;

use App\Models\Cinema;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Hall;
use App\Models\Projection;
use App\Models\Shopdetail;
class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//正在热映
    {   
        //上映影片
        $flist = Film::where('status','=',2)->orderBy('id','desc')->paginate(12);//每页18条数据
        return view("home.movie_list",compact('flist'));
    }

    public function soon()//即将上映
    {
        $soonflist = Film::where('status','=',1)->orderBy('id','desc')->paginate(12);//每页18条数据
        return view("home.movie_list_soon",compact('soonflist'));
    }


    //影片详情
    public function show($id)
    {   
        $comment = \DB::table('film_comment')->where('fid','=',$id)->get();

        $phone = [];
        foreach ($comment as $uid){
            $phone[] = \DB::table('users')->where('id',$uid->uid)->value('phone');
        }
        // $uid = session('users')->id;
        // $users = \Db::table('users')->where('id','=',$uid)->first();
        //echo "<pre>";
        //print_r($users);
        $first = Film::where('id','=',$id)->first();
        //echo "<pre>";
        //print_r($film);  
        return view("home.movie_show",compact("first","comment","phone"));
    }

    //选座购票
    public function content($id)
    {
        //查询电影信息
        $flists = Film::find($id);
        $prolist = Projection::where("fid",'=',$id)->get();//查询所有放映信息
        $ho=[];$haid=[];
        //遍历影厅
        foreach($prolist as $pro){
            $ho[] = Hall::where('id',$pro['hid'])->value('title');
        }
        foreach($prolist as $pro){
            $haid[] = Hall::where('id',$pro['hid'])->value('id');
        }
        //dd($ho);
        return view("home.cinema_seat",compact('prolist','flists','ho','haid'));
    }

    //选座
    public function layout($fid,$hid,$pid)
    {
        $fmfirst = Film::where('id',$fid)->first();//影片
        $hfirst = Hall::where('id',$hid)->first();//查询影厅
        $ctit = Shopdetail::where('id',$hfirst->cid)->first();//查询影厅对应的影院
        $ptime = Projection::where('id',$pid)->first();//放映信息
        //print_r($ctit);

      //      echo '<pre>';
//        var_dump('-- 布局信息 ---',$hfirst);
        //var_dump('-- 放映信息---',$ptime);
        $layout = "{\"0\":[\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"_\",\"_\",\"a\",\"a\",\"a\",\"a\",\"a\"],\"1\":[\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"_\",\"_\",\"a\",\"a\",\"a\",\"a\",\"a\"],\"2\":[\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"_\",\"_\",\"a\",\"a\",\"a\",\"a\",\"a\"],\"3\":[\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"_\",\"_\",\"a\",\"a\",\"a\",\"a\",\"a\"],\"4\":[\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"_\",\"_\",\"a\",\"a\",\"a\",\"a\",\"a\"],\"5\":[\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"_\",\"_\",\"a\",\"a\",\"a\",\"a\",\"a\"],\"6\":[\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"a\",\"_\",\"_\",\"a\",\"a\",\"a\",\"a\",\"a\"]}";

        $layout =json_decode($layout);
        return view("home.layout",compact('fmfirst','hfirst','ctit','ptime','layout'));
    }

    //执行Ajax评论添加
    public function Ajaxinsert(Request $request,$id)
    {
        //判断是否登录
        $users = session('users');
        //echo "<pre>";
        //print_r($usersid);
        if(empty($users)){
            return redirect("login");
        }
        $usersid = session('users')->id;
        //获取数据
        $data['fid'] = $id;
        //echo "<pre>";
        //print_r($data);
        $data['uid'] = $usersid;
        $str = $request->only(['comment']);
        $str['support'] = 1;
        $str['created_at'] = time();
        $info = array_merge($data,$str);
        //echo "<pre>";
        //print_r($info); 
        //添加到数据库
        \DB::table('film_comment')->insertGetId($info);
        return redirect("/films/{$info['fid']}.html");
        
    }

}
