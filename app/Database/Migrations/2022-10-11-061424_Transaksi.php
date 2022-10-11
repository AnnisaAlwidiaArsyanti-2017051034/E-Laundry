<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'no_invoice' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_pelanggan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'nomor_tlp_pelanggan' => [
                'type' => 'VARCHAR',
                'constraint' => '13',
            ],
            'alamat_pelanggan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'tanggal_masuk' => [
                'type' => 'DATETIME',
                'null' => 'true',
            ],
            'berat' => [
                'type' => 'INT',
                'constraint' => '2',
            ],
            'layanan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'tanggal_keluar' => [
                'type' => 'DATETIME',
                'null' => 'true',
            ],
            'biaya' => [
                'type' => 'INT',
                'constraint' => 7,
            ],
            'status_pembayaran' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'status_pengambilan' =>[
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

        ]);
        $this->forge->addKey('no_invoice', true);
        $this->forge->createTable('transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi');
    }
}
