<?php

namespace App\Controllers;

use App\Models\Transaksi;
use App\Models\User;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->userModel = new User();
        $this->transaksiModel = new Transaksi();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'user_logged_in' => $this->userModel->find($this->session->get('id')),
            'session' => \Config\Services::session()
        ];
        
        //$data['transhariini'] = $this->transaksiModel->getTransaksiHariIni()->num_rows();

        return view('dashboard/home', $data);
    }

    //--------------------------------------------------------------------

}
