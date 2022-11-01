<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = new User();
        $user = $userModel->findAll();
        $data = [
            'title' => 'User',
            'user' => $user,
        ];
        return view('User/List', $data);
    }
    public function create(){
        $userModel = new User();
        $user = $userModel->findAll();
        $data = [
            'title' => 'Tambah Pengguna',
            'user' => $user,
        ];
        return view('user/create', $data);
    }

    public function store(){
        if(!$this->validate([
            'nama_pengguna' => 'required|string',
            'email_pengguna' => 'required',
            'username_pengguna' => 'required|string',
            'password_pengguna' => 'required',
            'level_pengguna' => 'required',
        ])){
            return redirect()->to('/createUser');
        }
        $userModel = new User();
        $data = [
            'nama_pengguna' => $this->request->getPost('nama_pengguna'),
            'email_pengguna' => $this->request->getPost('email_pengguna'),
            'username_pengguna' => $this->request->getPost('username_pengguna'),
            'password_pengguna' => $this->request->getPost('password_pengguna'),
            'level_pengguna' => $this->request->getPost('level_pengguna'),
        ];
        $userModel->save($data);
        return redirect()->to('/user');
    }

    public function delete($id_pengguna){
        $userModel = new User();
        $userModel->delete($id_pengguna);
        
        return redirect()->to('/user');
    }

    public function edit($id_pengguna){
        $userModel = new user();
        $user = $userModel->find($id_pengguna);
        $data = [
            'title' => 'Edit user',
            'user' => $user,          
        ];
        return view('user/edit', $data);
    }

    public function update($id_pengguna){
        if(!$this->validate([
            'nama_pengguna' => 'required|string',
            'email_pengguna' => 'required',
            'username_pengguna' => 'required|string',
            'password_pengguna' => 'required',
            'level_pengguna' => 'required',
        ])){
            return redirect()->to('/editUser/'.$id_pengguna);
        }
        $userModel = new User();
        $data = [
            'nama_pengguna' => $this->request->getPost('nama_pengguna'),
            'email_pengguna' => $this->request->getPost('email_pengguna'),
            'username_pengguna' => $this->request->getPost('username_pengguna'),
            'password_pengguna' => $this->request->getPost('password_pengguna'),
            'level_pengguna' => $this->request->getPost('level_pengguna'),
        ];
        $userModel->update($id_pengguna, $data);
        return redirect()->to('/user');
    }
}
