<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class PersonalController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//个人中心
    {
        if(session("users")){
            $ufir = \DB::table("users_detail")->where('id',session("users")->id)->first();
            return view("personal.index",compact('ufir'));
        }else{
            return redirect('/login');
        }  
    }

    //个人订单
    public function orders()
    {
        $uorder = \DB::table("rel_orders")->where('uid',session('users')->id)->pluck('oid');
    
        //查询金额、订单状态
        foreach($uorder as $oid){
            $olist[] = \DB::table("orders")->where('id',$oid)->first();
        }
        //查询放映pid
        $pid = \DB::table("rel_orders")->where('uid',session('users')->id)->pluck('pid');
        //查询对应的放映信息
        foreach ($pid as $ppid) {
             $ptit[] = \DB::table("projection")->where('id',$ppid)->first();
        }

        //查询影院
        $sid = \DB::table("rel_orders")->where('uid',session('users')->id)->pluck('sid');
        foreach($sid as $cid){
            $ctit[] = \DB::table('shop_detail_copy')->where('cid',$cid)->first();
        }
        //遍历查询对应的影片title
        foreach ($ptit as $v) {
            $ftit[] = \DB::table('film')->where('id',$v->fid)->first();
        }
        //计算购买数量
        //dd($ftit);
        //dd($ctit);
        return view("personal.orders",compact('uorder','olist','ftit','ctit','ptit'));
    }

    //余额
    public function account()
    {
        $uid = session("users")->id;

        $money = \DB::table("users_detail")->where('id',$uid)->value('money');
        return view("personal.account",compact('money'));
    }

    public function setting()//账户设置
    {
        $uid = session("users")->id;
        $ufirst = \DB::table("users_detail")->where("id",$uid)->first();
        $phone = \DB::table("users")->where("id",$uid)->value('phone');
        return view("personal.settings",compact('ufirst','phone'));
    }

    //修改资料
    public function upaddress(Request $request ,$id)
    {
        $data['address'] = $request->input('address');
        \DB::table('users_detail')->where('id',$id)->update($data);
        return redirect('/account/settings');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $relshow = \DB::table('rel_orders')->where('oid',$id)->first();
        //查询影院
        $shop = \DB::table('shop_detail_copy')->where('id',$relshow->sid)->first();
        //查询放影厅
        $hall = \DB::table('projection')->where('id',$relshow->pid)->first();
        $halltit = \DB::table('hall')->where('id',$hall->hid)->first();
        //查询电影
        $film = \DB::table('film')->where('id',$hall->fid)->first();
        $ordershow = \DB::table("orders")->where('id',$id)->first();
        return view('personal.order_show',compact('ordershow','shop','halltit','film'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id){
            \DB::table('rel_orders')->where('oid',$id)->delete($id);
            \DB::table('orders')->where('id',$id)->delete();
            return redirect('personal/orders');
        }else{
            return redirect('personal/orders');
        }
    }
}
