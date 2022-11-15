<?php

namespace App\Controllers;

use App\Models\User;
use Myth\Auth\Password;
use Myth\Auth\Models\UserModel;
use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
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



    public function index()
    {

        $data = [
            'title' => 'User',
            'user' => $this->userModel->where('id >', 1)->findAll()

        ];
        return view('user/list', $data);
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
            'email' => 'required',
            'username' => 'required|string',
            'password' => 'required',
            'level' => 'required',
        ])) {
            return redirect()->to('/createUser');
        }
        $userModel = new UserModel();
        $data = [
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),

        ];
        $userModel->save($data);
        $id = $userModel->insertID();
        return dd($id);
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
        $userModel = new UserModel();
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

            'email' => 'required',
            'username' => 'required|string',
        ])) {
            return redirect()->to('/editUser' . $id);
        }
        $userModel = new User();

        if ($this->request->getPost('password') != '') {
            $data = [
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'password_hash' => Password::hash($this->request->getPost('password')),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $userModel->update($id, $data);

        } else {
            $data = [
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $userModel->update($id, $data);
        }
        return redirect()->to('/user');
    }
}
