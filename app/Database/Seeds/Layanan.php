<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Layanan extends Seeder
{
    public function run()
    {
        $data_layanan = [
            [
                'jenis_layanan' => 'Express',
                'estimasi_waktu' => '1 hari',
                'tarif' => '7000',
            ],
            [
                'jenis_layanan' => 'Reguler',
                'estimasi_waktu' => '3 hari',
                'tarif' => '5000',
            ],
        ];

        foreach($data_layanan as $data){
            $this->db->table('layanan')->insert($data);
        }
    }
}