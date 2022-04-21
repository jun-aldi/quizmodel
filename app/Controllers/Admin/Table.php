<?php

namespace App\Controllers\Admin;
use App\Models\UserModel;
use App\Controllers\BaseController;

class Table extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data = 
        [
            "title" => "Table",
            "page" => "table",
            "list" => $userModel->findAll(),
            // "list" => $userModel->where('avatar', '')->find()
        ];
        return view("dashboard/table", $data);
    }
}
