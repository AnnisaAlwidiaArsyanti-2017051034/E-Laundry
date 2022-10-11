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
    public function create(){
        $data = [
            'title' => 'Tambah Transaksi',         
        ];
        return view('transaksi/create', $data);
    }

    public function store(){
        if(!$this->validate([
            'nama_pelanggan' => 'required|string',
            'nomor_tlp_pelanggan' => 'required|numeric',
            'alamat_pelanggan' => 'required|string',
            'berat' => 'required|numeric',
            'layanan' => 'required|string',
            'status_pembayaran' => 'required|string',
        ])){
            return redirect()->to('/createTransaksi');
        }
        $transaksiModel = new Transaksi();
        $data = [
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'nomor_tlp_pelanggan' => $this->request->getPost('nomor_tlp_pelanggan'),
            'alamat_pelanggan' => $this->request->getPost('alamat_pelanggan'),
            'berat' => $this->request->getPost('berat'),
            'layanan' => $this->request->getPost('layanan'),
            'status_pembayaran' => $this->request->getPost('status_pembayaran'),
        ];
        $transaksiModel->save($data);
        return redirect()->to('/transaksi');
    }

    public function delete($no_invoice){
        $transaksiModel = new Transaksi();
        $transaksiModel->delete($no_invoice);
        
        return redirect()->to('/transaksi');
    }

    public function edit($no_invoice){
        $transaksiModel = new Transaksi();
        $data = [
            'layanan' => $transaksiModel->find($no_invoice),
            'title' => 'Edit Transaksi'
        ];
        return view('transaksi/edit', $data);
    }

    public function update($no_invoice){
        if(!$this->validate([
            'nama_pelanggan' => 'required|string',
            'nomor_tlp_pelanggan' => 'required|numeric',
            'alamat_pelanggan' => 'required|string',
            'berat' => 'required|numeric',
            'layanan' => 'required|string',
            'status_pembayaran' => 'required|string',
        ])){
            return redirect()->to('/editTransaksi/'.$no_invoice);
        }
        $transaksiModel = new Transaksi();
        $data = [
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'nomor_tlp_pelanggan' => $this->request->getPost('nomor_tlp_pelanggan'),
            'alamat_pelanggan' => $this->request->getPost('alamat_pelanggan'),
            'berat' => $this->request->getPost('berat'),
            'layanan' => $this->request->getPost('layanan'),
            'status_pembayaran' => $this->request->getPost('status_pembayaran'),
        ];
        $transaksiModel->update($no_invoice, $data);
        return redirect()->to('/transaksi');
    }

}
