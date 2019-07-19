<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends CmsController
{
    public function index(){
        return view('cms.pages.dashboard',$this->data);
    }
}
