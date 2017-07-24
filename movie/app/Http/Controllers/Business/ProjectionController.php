<?php

namespace App\Http\Controllers\Business;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Projection;
use App\Models\Hall;
class ProjectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //用session获取当前商户登录者id
        $cid = session('businessuser')->id;
        $prolist = Projection::where('cid',$cid)->paginate(8);
        $vo=[];
        //影片
        foreach($prolist as $pro){
            $vo[] = Film::where('id',$pro['fid'])->value('title');
        }
        //影厅
        $ho = [];
        foreach($prolist as $pro){
            $ho[] = \DB::table("hall")->where('id',$pro['hid'])->value('title');

        }
        return view('seller.pro_show',compact('prolist','vo','ho'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filmlist = Film::where('status',2)->get();//查询所有热映影片
        $cid = session('businessuser')->id;
        $halist = Hall::where('cid',$cid)->get();//查询当前商家的放映厅
        return view('seller.pro_create',compact('filmlist','halist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('fid','hid','price','seatinfo','starttime','endtime');
        $data['cid'] = session('businessuser')->id;;
        $res = Projection::insertGetId($data);
        if($res>0){
            return redirect('business/pro');
        }else{
            return back()->with("err","添加失败！");
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
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ed = Projection::where('id',$id)->first();
        //查询所有热映影片
        $filmlist = Film::where('status',2)->get();
        //查询当前商家的所有放映厅
        $cid = session('businessuser')->id;//获取当前商家id
        $halist = Hall::where('cid',$cid)->get();

        return view("seller.pro_edit",compact('ed','filmlist','halist'));
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
        //查询当前商家的所有放映厅
        $data = $request->only('fid','hid','price','seatinfo','starttime','endtime');
        $res = Projection::where('id',$id)->update($data);
        if($res>0){
            return redirect('business/pro');
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
        \DB::table('projection')->delete($id);
        return redirect('business/pro');

    }
}
