<?php

namespace App\DataEntrance;

use Illuminate\Support\Facades\Config;

trait Basic{
    public $data= [];

    public function data($key,$value= null){
        if(empty($key)) return false;
        return $this->data[$key]= $value;
    }

    public function makeTitle($backend,$seperator=': :',$front= null){
        if(!isset($front)){
            $front= Config::get('title.name');
        }
        return $front.$seperator.$backend;

    }
}

