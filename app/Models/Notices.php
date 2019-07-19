<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notices extends Model
{
     protected $fillable= ['title','notice_expiry_days','notice_updated_at'];
}
