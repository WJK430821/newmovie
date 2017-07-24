<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\User;

class UsersController extends Controller
{
    //加载主页
    public function index()
    {
        return view("admin.users.index");
    }

    //模板继承
    public function child(Request $request)
    {
        $db = \DB::table('users')->orderBy("id","desc");
        $where = [];
        //判断搜索账号是否存在
        if(!empty($request->has('name'))){
            //获取搜索账号
            $name = $request->input('name');
            //拼装搜索条件
            $db->where("phone","like","%{$name}%");
            $where ['phone'] = $name;
        }
        //每页显示6条
        $list = $db->paginate(6);
        return view("admin.users.child",["list"=>$list,'where'=>$where]);
    }
    //执行用户禁用
    public function del($id=0)
    {
        //实例化model类
        $user = new User();
        //执行会员禁用操作
        $user->where('id',$id)->update(['status'=>2]);
        return redirect("admin/users/show/{$id}");
    }
    //执行用户启用
    public function reset($id=0)
    {
        //实例化model类
        $user = new User();
        //执行会员启用操作
        $user->where('id',$id)->update(['status'=>1]);
        return redirect("admin/users/show/{$id}");
    }
    //查看用户详情
    public function show($uid=0)
    {
        //根据uid查询详细信息
        $list = User::where('id',$uid)->first();
        return view('admin.users.show',['list'=>$list]);
    }
}
