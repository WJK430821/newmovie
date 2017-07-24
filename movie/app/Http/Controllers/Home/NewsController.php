<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Film;
use EndaEditor;
class NewsController extends Controller
{
    public function index()
    {
    	$newlist = News::get();//资讯
    	$flist = Film::where('status',2)->limit(8)->get();
    	return view("home.news_list",compact('newlist','flist'));
    }

    public function show($id)
    {
    	$newshow = News::where('id',$id)->first();//资讯
    	$filmlist = Film::where('status',2)->limit(6)->get();
    	return view('home.news_detail',compact('newshow','filmlist'));
    }
}
