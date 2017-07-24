<?php


namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ShopDetailCopy;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
        
        $list = ShopDetailCopy::where("cid",$id)->first();
        return view("shop.edit",["vo"=>$list]);
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
        $shop_detail = ShopDetailCopy::where("cid",$id)->update(
            ['shopname'=>$shopname,"phone"=>$phone,"legal"=>$legal,"id_card"=>$id_card,"licence"=>$filename]
            );
        
        if($shop_detail>0){
            return redirect('/shop');
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
    //加载后台页面
	public function index()
	{
        $id=session("adminuser")->id;
         $shopdetail=ShopDetailCopy::where('cid',$id)->first();
        return view("shop.index",compact("shopdetail"));
    }
}
