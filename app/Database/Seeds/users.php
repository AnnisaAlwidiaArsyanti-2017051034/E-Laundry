<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        $data_users = [
            [
                'username' => 'silvia1006',
                'password' => '12345678',
                'name' => 'silvia',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
        ];

        foreach ($data_users as $data) {
            $this->db->table('users')->insert($data);
        }
    }
}
