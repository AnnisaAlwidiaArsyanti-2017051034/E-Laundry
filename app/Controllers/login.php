<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use App\Controllers\UserController;


class Login extends BaseController
{
    public function index()
    {
        $User = new \App\Models\User();
        $login = $this->request->getPost('login');
        if ($login) {
            $username_pengguna = $this->request->getPost('username_pengguna');
            $password_pengguna = $this->request->getPost('password_pengguna');

            if ($username_pengguna == '' or $password_pengguna == '') {
                $err = "Silahkan masukkan username_pengguna dan password_pengguna";
            }
            if (empty($err)) {
                $user = $User->where("username_pengguna", $username_pengguna)->first();
                if (
                    $user['password_pengguna'] != md5('password_pengguna')
                ) {
                    $err = "password_pengguna tidak sesuai";
                }
            }
            if (empty($err)) {
                $dataSesi = [
                    'user_id' => $user['user_id'],
                    'username_pengguna' => $user['username_pengguna'],
                    'password_pengguna' => $user['password_pengguna'],
                ];
                session()->set($dataSesi);
                return redirect()->to('/login');
            }
            if ($err) {
                session()->setFlashdata('username_pengguna', $username_pengguna);
                session()->setFlashdata('error', $err);
                return redirect()->to('/login');
            }
        }
        return view('Views/login');
    }
}

