<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use zgldh\QiniuStorage\QiniuStorage;
class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('id','desc')->paginate(10);
        return view("admin.news.news_show",compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view("admin.news.news_create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('title','description','content');
        $data['created_at'] = time();
        $data['updated_at'] = time();
        $data['status'] = 0;    
        // 图片上传
        if($request->hasFile('thumb')){
            $file = $request->file('thumb');

            $disk = QiniuStorage::disk('qiniu');

            $filename = md5($file->getClientOriginalName().time().rand()).'.'.$file->getClientOriginalExtension();

            $bool = $disk->put('uploads/'.$filename,file_get_contents($file->getRealPath()));
        }
        $data['thumb'] = $filename;
        // 结束
        $res = \DB::table('news')->insertGetId($data);
        //print_r($res);
        if($res>0){
            return redirect('/admin/news');
        }else{
            return back()->with("err","添加失败!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.news.newinsert');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $newfir = News::where('id',$id)->first();
        return view('admin.news.news_edit',compact('newfir'));
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
        $data = $request->only('title','description','content');
       
        
        $data['updated_at'] = time();
        //图片上传
        if($request->hasFile('thumb')){
            $file = $request->file('thumb');
            $disk = QiniuStorage::disk('qiniu');
            $filename = md5($file->getClientOriginalName().time().rand()).'.'.$file->getClientOriginalExtension();
            $bool = $disk->put('uploads/'.$filename,file_get_contents($file->getRealPath()));
            $data['thumb'] = $filename;
        }else{
            $data['thumb'] =  News::where('id',$id)->value('thumb');
        }


        $res = News::where('id',$id)->update($data);
        if($res>0){
            return redirect('admin/news');
        }else{
            return back()->with("err","修改失败！");
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
        \DB::table('news')->delete($id);
        return redirect('/admin/news');
    }
}
