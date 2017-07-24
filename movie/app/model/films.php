<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class films extends Model
{
    //影片信息
    protected $table = 'film';
}
class Article extends Model {
    protected $dates = ['expired_at'];

}
