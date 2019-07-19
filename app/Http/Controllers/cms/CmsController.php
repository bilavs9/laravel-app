<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CmsController extends Controller
{
    protected $cmsPath= 'cms.';
    public $pagePath= null;
    public function __construct()
    {
        $this->data('title',$this->makeTitle('admin'));
        $this->pagePath= $this->cmsPath.'pages.';
    }
}
