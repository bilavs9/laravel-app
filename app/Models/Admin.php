<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Admin extends User
{
     protected $fillable= ['name', 'user_name',	'email', 'privilege', 'status',	'image', 'password', 'confirm_password'];
}
