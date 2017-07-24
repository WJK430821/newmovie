<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup;
class SetupController extends Controller
{
    //加载主页
    public function index()
    {
    	$web = Setup::first();
    	return view("admin.setup",['webs'=>$web]);
    }
    public function edit($id)
    {
        $web = Setup::where('id',$id)->first();
        //  echo "<pre>";
        // print_r($web);
        return view("admin.setup",['webs'=>$web]);
    }

    public function update($id,Request $request)
    {
    	$data = $request->only("title",'keywords','description','icp','anbei','company','email');
    	$data['updatetime'] = time();
    	$res = Setup::where('id',$id)->update($data);
    	if($res>0){
    		return redirect('admin/setup');
    	}else{
    		return back()->with("err","修改失败!");
    	}
    }

    public function store(Request $request)
    {
    	$data = $request->only("title",'keywords','description','icp','anbei','company','email');
    	$data['addtime'] = time();
    	$id = Setup::insertGetId($data);
    	if($id>0){
    		return redirect('admin/setup');
    	}else{
			return back()->with("err","修改失败!");
    	}
    }
    
}
