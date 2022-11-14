<?php

namespace App\Controllers;

use App\Models\Layanan;
use App\Models\Transaksi;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->transaksiModel = new Transaksi();
    }

    public function index()
    {
        $transaksiModel = new Transaksi();
        $transbylayanan = $transaksiModel->select('COUNT(id_transaksi) as total, layanan.jenis_layanan as jenis_layanan')
                        ->join('layanan', 'transaksi.layanan = layanan.layanan_id')
                        ->groupBy('transaksi.layanan', 'ASC')->get();
        $transbybayar = $transaksiModel->select('COUNT(id_transaksi) as total, status_pembayaran')
                        ->groupBy('status_pembayaran', 'ASC')->get();
        $transbyambil = $transaksiModel->select('COUNT(id_transaksi) as total, status_pengambilan')
                        ->groupBy('status_pengambilan', 'ASC')->get();
        $data = [
            'title' => 'Dashboard',
            'user_logged_in' => user()->username,
            'hari_ini' => (new Transaksi())->getTotalDay(date('Y-m-d')),
            'bulan_ini' => (new Transaksi())->getTotalMont(date('Ym')),
            'year_ini' => (new Transaksi())->getTotalYear(date('Y')),
            'selama_ini' => (new Transaksi())->getTotalSelamaIni(),
            'transbylayanan' => $transbylayanan,
            'transbybayar' => $transbybayar,
            'transbyambil' => $transbyambil,
        ];

        return view('dashboard/home', $data);
    }

    //--------------------------------------------------------------------

}
