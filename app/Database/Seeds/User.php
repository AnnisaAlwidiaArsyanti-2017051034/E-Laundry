<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $data_user = [

            [
                'nama' => 'arsya',
                'email' => 'kimarsya201@gmail.com',
                'username' => 'arsya',
                'password' => '12345arsya',
                'role' => 'Admin',
            ],
        ];

        foreach ($data_user as $data) {
            $this->db->table('user')->insert($data);
        }
    }
}
