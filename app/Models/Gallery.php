<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
         protected $fillable = ['image_name','user_id','caption'];
}
