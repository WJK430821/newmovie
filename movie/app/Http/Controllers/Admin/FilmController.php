<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\films;
use App\Model\Article;
use App\Models\Film;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //加载影片浏览页

        $list = Film::all();
        return view("admin.film.index",compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.film.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //定义一个空数组
        $array= [];
        //获取除图片外的信息
        $data = $request->only(['fid','title','firsttime','duration','director','actor','region','introduction','language','score','status']);
        //$picname = $data['picname'];
        //echo "<pre>";
        //print_r($data);
        //判断是否是有效的文件
        if ($request->file('picname') && $request->file('picname')->isValid()){
            //获取上传文件信息
            $file = $request->file('picname');
            //echo "<pre>";
            //print_r($file);
            $ext = $file->extension(); //获取文件的扩展名
            //随机一个新的文件名
           
            $filename = time().rand(1000,9999).".".$ext;
            
            $array['picname'] = $filename;
            //echo "<pre>";
            //print_r($array);
            //拼接两个信息            
            $info = array_merge($data,$array);
            //echo "<pre>";
            //print_r($info);
            //添加进数据库
            Films::insertGetId($info);
            //print_r($array);
            //移动图片
            //echo "<pre>";
            //print_r($filename);
            $file->move("./uploads/",$filename);
            //$file->move("./uploads/s_".$filename,$fileneme)->resize(100,100);
            //$img1->save("./uploads/s_".$filename);                   
            //return response($filename); //输出
            
        } 

        
        return redirect("/admin/film");
       
    }
    //图片上传
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
        $str = Films::where('id','=',$id)->first();
        //echo "<pre>";
        //print_r($str);
        return view("admin.film.edit",['str'=>$str]);
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
        $data = $request->only(['fid','title','engname','firsttime','duration','director','actor','region','introduction','language','score','status']);
        //$data['updated_at'] = null;
        $id = Films::where('id','=',$id)->update($data);
        //echo "<pre>";
        //print_r($id);
        if($id>0){
            return redirect("/admin/film");
        }else{
            echo "修改失败！";
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
