<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reg extends Model
{
    //设置表名
    protected $table = "users";
    //设置主键
    protected $primaryKey = "id";
    //批量赋值属性
    protected $fillable = ['phone','password','addtime'];
    //不被批量赋值属性
    protected $guarded = ['id'];
    /**
     * 表明模型是否应该被打上时间戳
     *
     * @var bool
     */
    public $timestamps = false;

}
