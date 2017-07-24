<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RelOrders;
use App\Models\Projection;
use App\Models\Film;
use App\Models\Users;
use App\Models\Orders;
use App\Models\Hall;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=session("adminuser")->id;
        //获取订单用户放映信息信息
        $pid=RelOrders::where("sid",$id)->pluck("pid");
        $fid=[];
        foreach ($pid as $po) {
            $fid[]=Projection::where("id",$po)->value("fid");
        }
        
        // echo "<pre>";
        // print_r($fid);
        // die();
        $film=[];
        foreach ($fid as $fo) {

            $film[]=Film::where("id",$fo)->value("title");
        }
        
        //获取用户信息
       $uid=RelOrders::where("sid",$id)->pluck("uid");
       $user=[];
       foreach ($uid as $uo) {
           $user[]=Users::where("id",$uo)->value("phone");
       }

        //获取下单时间
        $oid=RelOrders::where("sid",$id)->pluck("oid");
        $orders=Orders::whereIn("id",$oid)->get();
        $orderid=RelOrders::where("sid",$id)->pluck("id");

        // echo "<pre>";
        // print_r($orderid);
        // die();
		return view("shop.orders.index",compact("film","user","orders","orderid"));
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
    public function store(Request $request,$id)
    {
        $orders=Orders::where("id",$id)->first();
        //获取用户名称
        $uid=RelOrders::where("oid",$id)->value("uid");
        $user=Users::where("id",$uid)->value("phone");
        //获取影厅信息
        $pid=RelOrders::where("oid",$id)->value("pid");

        $hid=Projection::where("id",$pid)->value("hid");

        $hall=Hall::where("id",$hid)->value("title");

        //获取影片名称
        $fid=Projection::where("id",$pid)->value("fid");
        
        $film=Film::where("id",$fid)->value("title");
        // echo "<pre>";
        // print_r($orders);
        // die();
        return view("shop.orders.details",compact("orders","user","hall","film"));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        //
    }
}
