<?php

namespace App\Database\Seeds;
use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class Transaksi extends Seeder
{
    public function run()
    {
        $data_transaksi = [
            [
                'nama_pelanggan' => 'Annisa',
                'nomor_tlp_pelanggan' => '082281301196',
                'alamat_pelanggan' => 'Hanura',
                'tanggal_masuk' => Time::now(),
            ],
        ];

        foreach($data_transaksi as $data){
            $this->db->table('transaksi')->insert($data);
        }
    }
}
