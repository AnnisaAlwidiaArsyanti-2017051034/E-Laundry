<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = new User();
        $user = $userModel->findAll();
        $data = [
            'title' => 'User',
            'user' => $user,
        ];
        return view('User/List', $data);
    }
}
