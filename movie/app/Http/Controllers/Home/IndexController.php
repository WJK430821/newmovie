<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Film;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fmlist = Film::where('status','=',2)->limit(8)->get();
    	$flist = Film::where('status','=',1)->limit(8)->get();
        //print_r($fmlist);
        return view("home.index",compact('fmlist','flist'));
    }

}
