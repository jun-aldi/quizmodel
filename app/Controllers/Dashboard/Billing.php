<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class Billing extends BaseController
{
    public function index()
    {
        $data = 
        [
            "title" => "Billing Dashboard",
            "page" => "billing",
        ];
        return view("dashboard/billing", $data);
    }
}
