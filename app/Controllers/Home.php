<?php

namespace App\Controllers;
use App\Controllers\BaseController;
class Home extends BaseController
{
    
    public function index()
    {
        $data = 
        [   'tittle' => "Home",
            'page' => "home"
        ];
        return view("home", $data);
    }
}
