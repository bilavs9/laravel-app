<?php

namespace App\Http\Controllers\frontend;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class frontendController extends Controller
{
    protected $frontendPath= 'frontend.';
    public $pagePath= null;
    public function __construct()
    {
        $this->data('menuData',Menu::orderBy('id','desc')->get());
        $this->data('title',$this->makeTitle('Welcome'));
        $this->pagePath= $this->frontendPath.'pages.';
    }
}
