<?php

namespace App\Controllers;
use app\Models\Transaksi;

class Home extends BaseController
{
    public function index()
    {
        return view('Views/home');
    }
    public function countData($table){
        $transaksiModel = new Transaksi();
        $transaksi = $transaksiModel->countAllResults();
        $table = [
            'transaksi' => $transaksi,
        ];
        return view('Views/home', $table);
    }
}
