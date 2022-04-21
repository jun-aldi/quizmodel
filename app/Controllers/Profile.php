<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Controllers\BaseController;

class Profile extends BaseController
{
    public function detail($username)
    {
        $userModel = new UserModel();
        $data = 
        [
            "title" => "Profile Dashboard",
            "page" => "profile",
            'item' => $userModel->where(['username' => $username])->first()
        ];
        return view("dashboard/profile", $data);
    }
}
