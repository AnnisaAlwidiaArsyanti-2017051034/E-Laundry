<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Transaksi;

class TransaksiController extends BaseController
{
    public function index()
    {
        $transaksiModel = new Transaksi();
        $transaksi = $transaksiModel->findAll();
        $data = [
            'title' => 'Transaksi',
            'transaksi' => $transaksi,            
        ];
        return view('transaksi/list', $data);
    }
}
