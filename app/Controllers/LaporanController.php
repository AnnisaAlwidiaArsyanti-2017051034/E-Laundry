<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Transaksi;
class LaporanController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Laporan Pendapatan',
        ];
        return view('laporan/laporan', $data);
    }
    public function periode_laporan()
    {
        $tgl_awal = $this->request->getPost('tgl_awal');
        $tgl_akhir = $this->request->getPost('tgl_akhir');
        $transaksiModel = new Transaksi();
        $datalaporan = $transaksiModel->join('layanan', 'transaksi.layanan = layanan.layanan_id')
        ->where('tanggal_masuk >= ', $tgl_awal)
        ->where('tanggal_masuk <= ', $tgl_akhir)
        ->orderBy('id_transaksi', 'ASC')
        ->get()
        ->getResultArray();
        $data = [
            'title' => 'Laporan Pendapatan Periode Transaksi',
            'tgl_awal' =>  $tgl_awal,
            'tgl_akhir' =>  $tgl_akhir,
            'datalaporan' => $datalaporan,
        ];
        return view('laporan/view', $data);
    }
    public function printlaporan($tgl_awal, $tgl_akhir)
    {
        $transaksiModel = new Transaksi();
        $datalaporan = $transaksiModel->join('layanan', 'transaksi.layanan = layanan.layanan_id')
        ->where('tanggal_masuk >= ', $tgl_awal)
        ->where('tanggal_masuk <= ', $tgl_akhir)
        ->orderBy('id_transaksi', 'ASC')
        ->get()
        ->getResultArray();
        $data = [
            'tgl_awal' =>  $tgl_awal,
            'tgl_akhir' =>  $tgl_akhir,
            'datalaporan' => $datalaporan,
        ];
        return view('laporan/print', $data);
    }
}
