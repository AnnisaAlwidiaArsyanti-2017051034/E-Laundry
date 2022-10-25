<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $data_user = [
            [
                'nama' => 'Annisa Arsya',
                'email' => 'kimarsya2409@gmail.com',
                'username' => 'arsya2409',
                'password' => '12345678',
                'level' => 'Super Admin',
            ],
        ];

        foreach($data_user as $data){
            $this->db->table('user')->insert($data);
        }
    }
}
