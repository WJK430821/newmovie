<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
	 //设置表
    protected $table = "shop_detail_copy";
	//设置主键
	protected $primaryKey = "id";
	/**
	 * 表明模型是否应该被打上时间戳
	 *
	 * @var bool
	 */
	public $timestamps = false;
}
