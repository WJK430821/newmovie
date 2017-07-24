<?php

namespace App\Http\Controllers\Business;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shopdetail;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = session('businessuser')->id;
        $seller = Shopdetail::where('shop_id',$id)->first();
        return view('seller.index',compact('seller'));//加载商户后台首页
    }

    public function changePass()
    {
        $id = session('businessuser')->id;
        $seller = \DB::table('rel_shop')->where('id',$id)->first();
        //加载修改密码模板
        return view("seller.pass_change",compact('seller'));
    }

    public function change(Request $request ,$id)
    {
        //执行验证密码，并跳转到设置密码页面
        $pass = $request->only('password');
        $res = \DB::table('rel_shop')->where('id',$id)->first();
        if(md5($pass) == $res->password){
            return redirect("business/change");
        }else{
            return back()->with("msg","原密码输入错误！");
        }
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
        //
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
        //
    }
}
