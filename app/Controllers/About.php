<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class About extends BaseController
{
    public function index()
    {
        $data = 
        [   'tittle' => "About",
            'page' => "about"
        ];
        return view("about", $data);
    }
}
