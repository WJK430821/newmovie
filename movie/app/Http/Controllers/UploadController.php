<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use zgldh\QiniuStorage\QiniuStorage;
use EndaEditor;
class UploadController extends Controller
{

	public function index()
	{
		return view('seller.up');
	}

    public function upload(){

        // path 为 public 下面目录，比如我的图片上传到 public/uploads 那么这个参数你传uploads 就行了

        $data = EndaEditor::uploadImgFile('uploads');

        return json_encode($data);

    }
}
