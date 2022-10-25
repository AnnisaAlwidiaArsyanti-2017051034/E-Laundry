<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Layanan;

class LayananController extends BaseController
{
    public function index()
    {
        $layananModel = new Layanan();
        $layanan = $layananModel->findAll();
        $data = [
            'title' => 'Layanan',
            'layanan' => $layanan,            
        ];
        return view('layanan/list', $data);
    
    }
    public function create(){
        $data = [
            'title' => 'Tambah Layanan',         
        ];
        return view('layanan/create', $data);
    }

    public function store(){
        if(!$this->validate([
            'jenis_layanan' => 'required|string',
            'estimasi_waktu' => 'required',
            'tarif' => 'required|numeric',
        ])){
            return redirect()->to('/create');
        }
        $layananModel = new Layanan();
        $data = [
            'jenis_layanan' => $this->request->getPost('jenis_layanan'),
            'estimasi_waktu' => $this->request->getPost('estimasi_waktu'),
            'tarif' => $this->request->getPost('tarif'),
        ];
        $layananModel->save($data);
        return redirect()->to('/layanan');
    }

    public function delete($layanan_id){
        $layananModel = new Layanan();
        $layananModel->delete($layanan_id);
        
        return redirect()->to('/layanan');
    }

    public function edit($layanan_id){
        $layananModel = new Layanan();
        $data = [
            'layanan' => $layananModel->find($layanan_id),
            'title' => 'Edit Layanan'
        ];
        return view('layanan/edit', $data);
    }

    public function update($layanan_id){
        if(!$this->validate([
            'jenis_layanan' => 'required|string',
            'estimasi_waktu' => 'required',
            'tarif' => 'required|numeric',
        ])){
            return redirect()->to('/edit/'.$layanan_id);
        }
        $layananModel = new Layanan();
        $data = [
            'jenis_layanan' => $this->request->getPost('jenis_layanan'),
            'estimasi_waktu' => $this->request->getPost('estimasi_waktu'),
            'tarif' => $this->request->getPost('tarif'),
        ];
        $layananModel->update($layanan_id, $data);
        return redirect()->to('/layanan');
    }

}
