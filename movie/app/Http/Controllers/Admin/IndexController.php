<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //加载后台页面
	public function index()
	{
		return view("admin.index");
	}
}
