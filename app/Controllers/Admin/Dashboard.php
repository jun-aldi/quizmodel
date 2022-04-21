<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = 
        [
            "title" => "Dashboard Admin",
            "page" => "dashboard",
        ];

        return view('dashboard', $data);
    }
}
