<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\Projection;
use App\Models\Hall;
use App\Models\Film;


class CinemafsfController extends Controller
{
    public function index()//影院列表
    {
        $list=\DB::table("shop_region")->where("upid",0)->pluck("city");
        return view("home.base",compact("list"));
    }
}
