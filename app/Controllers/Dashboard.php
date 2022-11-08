<<<<<<< HEAD
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
=======
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
>>>>>>> 5dcbec202b6a21da831f460619e6ad883d9563cd
