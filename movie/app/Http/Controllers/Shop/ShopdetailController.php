<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shopdetail;
use Illuminate\Validation\Rule;

class ShopdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        //获取登录者信息
		//$shopdetail=$request->session()->all();
        //获取登录者的id
		$id=$request->session()->get('adminuser')->id;
        //获取登录者对应的详情
		$shopdetail=\DB::table("shop_detail_copy")->where('cid',$id)->first();
		return view("shop.shopdetail.index",compact("shopdetail"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.shopdetail.create");
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
        $list = \DB::table("shop_detail_copy")->where("cid",$id)->first();
		return view("shop.shopdetail.edit",["vo"=>$list]);
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
        //获取影院名称
        $shopname=$request->input("shopname");
        //获取电话
        $phone=$request->input("phone");
        //获取法人代表
        $legal=$request->input("legal");
        //获取身份证信息
        $id_card=$request->input("id_card");
        //判断是否是一个有效上传文件
        // //获取除上传文件以外的所有
        // $data = $request->only("shopname","phone","legal","id_card"); 
        //判断是否是一个有效上传文件
        if($request->file('licence') && $request->file('licence')->isValid()) {
            //获取上传文件信息
            $file = $request->file('licence');
            $ext = $file->extension(); //获取文件的扩展名
            //随机一个新的文件名
            $filename = time().rand(1000,9999).".".$ext;
            //移动上传文件
            $file->move("./upload/",$filename);
            
        }
        $shop_detail = \DB::table("shop_detail_copy")->where("cid",$id)->update(
            ['shopname'=>$shopname,"phone"=>$phone,"legal"=>$legal,"id_card"=>$id_card,"licence"=>$filename]
            );
		
        if($shop_detail>0){
            return redirect('shop/shopdetail');
        }else{
            return back()->with("err","修改失败!");
        }
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
