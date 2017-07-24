<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setup extends Model
{
    //关联数据表
	protected $table=("websetup");

	protected $fillable = ['title','keywords','description','icp'];
}
