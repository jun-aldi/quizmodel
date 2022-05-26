<?php

namespace App\Controllers;
use App\Controllers\BaseController;
class Home extends BaseController
{
    
    public function index()
    {
        $data = 
        [   'title' => "Home",
            'page' => "home"
        ];
        return view("home", $data);
    }
}
