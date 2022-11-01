<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $data_user = [
            [
                'nama_pengguna' => 'Annisa Arsya',
                'email_pengguna' => 'kimarsya2409@gmail.com',
                'username_pengguna' => 'arsya2409',
                'password_pengguna' => '12345678',
                'level_pengguna' => 'Super Admin',
            ],
        ];

        foreach($data_user as $data){
            $this->db->table('user')->insert($data);
        }
    }
}
