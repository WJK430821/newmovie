<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use zgldh\QiniuStorage\QiniuStorage;
use App\Model\Article;

class CeshiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //加载影片浏览页
        $picname = \DB::table('ceshi')->get();
        //echo "<pre>";
        //print_r($picname);
        return view("admin.ceshi.index",['list'=>$picname]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.ceshi.create");
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
         if ($request->file('picname') && $request->file('picname')->isValid()){
            //获取上传文件信息
            $file = $request->file('picname');
            $ext = $file->extension(); //获取文件的扩展名
            //随机一个新的文件名
            $filename = time().rand(1000,9999).".".$ext;
            //echo "<pre>";
            //print_r($filename);
            //初始化
            $disk = QiniuStorage::disk('qiniu');
            //上传到七牛
            $bool = $disk->put('iwanli/image_'.$filename,file_get_contents($file->getRealPath()));
            //判断是否上传成功
            if($bool){
                $data['picname'] = $disk->downloadUrl('iwanli/image_'.$filename);
                //echo "<pre>";
                //print_r($data);
                \DB::table('ceshi')->insert($data);
                return redirect('/admin/ceshi/create');
            }
            //return '上传失败！';


            
            
            
        } 

        
        
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
