<?php

namespace App\Http\Controllers\frontend;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationController extends frontendController
{
    public function index(){
        $this->data('galleryData',Gallery::all());
        return view($this->pagePath.'home',$this->data);
    }
}
