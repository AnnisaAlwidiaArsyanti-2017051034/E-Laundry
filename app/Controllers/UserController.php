<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class UserController extends BaseController
{
    public function __construct()
    {
        $this->userModel = new User();
    }

    protected function _validation()
    {
        if ($this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi.'
                ]
            ],
            'username' => [
                'rules' => 'required|alpha_numeric|is_unique[user.username,id,{id}]',
                'errors' => [
                    'required' => 'Username harus diisi.',
                    'alpha_numeric' => 'Username hanya boleh diisi dengan huruf dan angka.',
                    'is_unique' => 'Username sudah digunakan.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi.',
                    'valid_email' => 'Email tidak valid.'
                ]
            ],
            'passsword' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi.'
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role harus diisi.'
                ]
            ]
        ])) {
            return true;
        }
    }

    // public function index()
    // {
    //     $data = [
    //         'title' => 'User',
    //         'user_logged_in' => $this->userModel->find($this->session->get('user_id')),
    //         'users' => $this->userModel->getUser(),
    //         'session' => \Config\Services::session()
    //     ];

    //     return view('user/index', $data);
    // }

    // public function new()
    // {
    //     $data = [
    //         'title' => 'User',
    //         'user_logged_in' => $this->userModel->find($this->session->get('user_id')),
    //         'validation' => \Config\Services::validation()
    //     ];

    //     return view('user/new', $data);
    // }

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
    public function create()
    {
        $userModel = new User();
        $user = $userModel->findAll();
        $data = [
            'title' => 'Tambah Pengguna',
            'user' => $user,
        ];
        return view('user/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama' => 'required|string',
            'email' => 'required',
            'username' => 'required|string',
            'password' => 'required',
            'role' => 'required',
        ])) {
            return redirect()->to('/createUser');
        }
        $userModel = new User();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'role' => $this->request->getPost('role'),
        ];
        $userModel->save($data);
        return redirect()->to('/user');
    }

    public function delete($id)
    {
        $userModel = new User();
        $userModel->delete($id);

        return redirect()->to('/user');
    }

    public function edit($id)
    {
        $userModel = new user();
        $user = $userModel->find($id);
        $data = [
            'title' => 'Edit user',
            'user' => $user,
        ];
        return view('user/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama' => 'required|string',
            'email' => 'required',
            'username' => 'required|string',
            'password' => 'required',
            'role' => 'required',
        ])) {
            return redirect()->to('/editUser' . $id);
        }
        $userModel = new User();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'role' => $this->request->getPost('role'),
        ];
        $userModel->update($id, $data);
        return redirect()->to('/user');
    }
}
