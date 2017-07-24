<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;

class RootController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $db = \DB::table('admin')->orderBy("id","desc");
        $where = [];
        //添加搜索条件
        if($request->has('name')){
            $name = $request->input('name');
            $db->where("account","like","%{$name}%");
            $where[] = $name;
        }
        //每页显示6条数据
        $list = $db->paginate(6);
        return view('admin.root.child',['list'=>$list,'where'=>$where]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载管理员添加模板
        if(session("admin")->status != 2){
            echo "<script>alert('抱歉，您没有操作权限!!!')</script>";
            echo "<script>window.history.back()</script>";
        }else{
            return view("admin.root.add");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //获取用户数据
        $account = $request->account;
        $password = md5(md5($request->input('pass')."lixuwen"));
        $name = $request->name;

        //判断账号是否存在
        $info = Admin::where("account", $account)->first();
        if ($info) {
            return back()->with('msg', '账号已存在');
        }
        //执行普通管理员添加
        $id = \DB::table('admin')->insertGetId(["account" => $account, "pass" => $password, "name" => $name, "role" => 1, "status" => 3, "addtime" => time()]);
        if($id>0){
            return redirect("/admin/root");
        }else{
            return back()->with("msg","添加失败");
            return redirect("/admin/create");
        }

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
    //启用管理员
    public function edit($id)
    {
        //判断是否为超级管理员
        if(session("admin")->status != 2){
            echo "<script>alert('您没有操作权限')</script>";
            echo "<script>window.history.back()</script>";
            return ;
        }else{
            Admin::where('id',$id)->update(['status'=>3]);
            return redirect('admin/root/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //禁用管理员
    public function update(Request $request, $id)
    {
        //如果为1不能禁用
        if($id == 1){
            echo "<script>alert('超级管理员不能禁用')</script>";
            echo "<script>window.history.back()</script>";
            return ;
        }
        //判断是否为超级管理员
        if(session("admin")->status != 2){
            echo "<script>alert('您没有操作权限')</script>";
            echo "<script>window.history.back()</script>";
            return ;
        }else{
            $admin = new Admin();
            $admin->where('id',$id)->update(['status'=>4]);
            return redirect('admin/root/');
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

    }
}
