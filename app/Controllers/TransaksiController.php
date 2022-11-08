<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Transaksi;
use App\Models\Layanan;
use Config\Database;

class TransaksiController extends BaseController
{

    protected $modelsimpanan;
    public function __construct()
    {
        $this->transaksiModel = new Transaksi();
    }
    public function index()
    {

        $transaksi = $this->transaksiModel->getLayanan()->getResult();

        // var_dump($transaksiModel);
        $data = array(
            'title' => 'Transaksi',
            'transaksi' => $transaksi,
            // 'query' => $query,
        );
        return view('transaksi/list', $data);
    }
    public function create()
    {


        $layananModel = new Layanan();


        $layanan = $layananModel->findAll();
        $transaksiModel = new Transaksi();
        $transaksi = $transaksiModel->findAll();
        $data = [
            'title' => 'Tambah Transaksi',
            'layanan' => $layanan,
            'transaksi' => $transaksi,
        ];
        return view('transaksi/create', $data);
    }

    public function getLayanan()
    {

        if ($this->request->getVar('action')) {
            $action = $this->request->getVar('action');

            if ($action == 'get_layanan') {
                $layananModel = new Layanan();

                $layananData = $layananModel->where('layanan_id', $this->request->getVar('layanan_id'))->findAll();

                echo json_encode($layananData);
            }
        }
    }

    public function store()
    {
        if (!$this->validate([
            'nama_pelanggan' => 'required|string',
            'nomor_tlp_pelanggan' => 'required|numeric',
            'alamat_pelanggan' => 'required|string',
            'tanggal_masuk' => 'required',
            'berat' => 'required',
            'layanan' => 'required',
            'status_pembayaran' => 'required',
        ])) {
            return redirect()->to('/createTransaksi');
        }
        $transaksiModel = new Transaksi();
        $data = [
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'nomor_tlp_pelanggan' => $this->request->getPost('nomor_tlp_pelanggan'),
            'alamat_pelanggan' => $this->request->getPost('alamat_pelanggan'),
            'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
            'berat' => $this->request->getPost('berat'),
            'layanan' => $this->request->getPost('layanan'),
            'tanggal_keluar' => $this->request->getPost('tanggal_keluar'),
            'biaya' => $this->request->getPost('biaya'),
            'status_pembayaran' => $this->request->getPost('status_pembayaran'),
        ];
        $transaksiModel->save($data);
        return redirect()->to('/transaksi');
    }

    public function delete($no_invoice)
    {
        $transaksiModel = new Transaksi();
        $transaksiModel->delete($no_invoice);

        return redirect()->to('/transaksi');
    }

    public function edit($no_invoice)
    {
        $transaksiModel = new Transaksi();
        $transaksi = $transaksiModel->find($no_invoice);
        $layananModel = new Layanan();
        $layanan = $layananModel->findAll();
        $data = [
            'title' => 'Edit Transaksi',
            'transaksi' => $transaksi,
            'layanan' => $layanan,
        ];
        return view('transaksi/edit', $data);
    }

    public function update($no_invoice)
    {
        if (!$this->validate([
            'nama_pelanggan' => 'required|string',
            'nomor_tlp_pelanggan' => 'required|numeric',
            'alamat_pelanggan' => 'required|string',
            'tanggal_masuk' => 'required',
            'berat' => 'required',
            'layanan' => 'required|string',
            'status_pembayaran' => 'required',
            'status_pengambilan' => 'required',
        ])) {
            return redirect()->to('/editTransaksi/' . $no_invoice);
        }
        $transaksiModel = new Transaksi();
        $data = [
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'nomor_tlp_pelanggan' => $this->request->getPost('nomor_tlp_pelanggan'),
            'alamat_pelanggan' => $this->request->getPost('alamat_pelanggan'),
            'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
            'berat' => $this->request->getPost('berat'),
            'layanan' => $this->request->getPost('layanan'),
            'biaya' => $this->request->getPost('biaya'),
            'status_pembayaran' => $this->request->getPost('status_pembayaran'),
            'status_pengambilan' => $this->request->getPost('status_pengambilan'),
        ];
        $transaksiModel->update($no_invoice, $data);
        return redirect()->to('/transaksi');
    }
}
