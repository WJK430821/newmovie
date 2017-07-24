<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //设置表名
    protected $table = "users_detail";

    //设置主键
    protected $primaryKey = "id";

    /**
     * 表明模型是否应该被打上时间戳
     *
     * @var bool
     */
    public $timestamps = false;

}
