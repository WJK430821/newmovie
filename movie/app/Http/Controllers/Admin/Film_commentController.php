<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Article;


class Film_commentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //查询所有的评论信息
        $data = \DB::table("film_comment")->get();
        $title = null;
        $phone = null;
        $comment = null;
        //遍历查询评论中所有的影片名
        foreach ($data as $fid) {
            $title[] = \DB::table("film")->where('id',$fid->fid)->value('title');
        }
        //遍历查询评论中所有的用户名
        foreach ($data as $uid) {
            $phone[] = \DB::table("users")->where('id',$uid->uid)->value('phone');
        }
       
        foreach ($data as $comment) {
            $list = $comment;
            //echo "<pre>";
            //print_r($list);
        }
       
        //加载评论浏览页
        return view("admin.flim_comment.index",compact("data","title","phone"));
        
    }

   /* public function comment($id){
        //根据id查询
        $firstcomment = \DB::table("film_comment")->where('id',$id)->first();
        //echo "<pre>";
        //print_r($id);
        return view("admin.flim_comment.index",compact("data","title","phone","firstcomment"));
        
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }
      public function doUpload(Request $request)
    {
         //判断是否是一个有效上传文件
        
    }
    

    
     /* Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     
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
