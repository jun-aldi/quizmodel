<?php

namespace App\Controllers\Dashboard;

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
