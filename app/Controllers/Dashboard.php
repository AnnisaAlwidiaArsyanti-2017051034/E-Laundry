<?php

namespace App\Controllers;

use App\Models\User;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->userModel = new User();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'user_logged_in' => $this->userModel->find($this->session->get('id')),
            'session' => \Config\Services::session()
        ];

        return view('dashboard/home', $data);
    }

    //--------------------------------------------------------------------

}
