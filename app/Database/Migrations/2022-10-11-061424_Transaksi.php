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
                'type' => 'DATE',
                'null' => 'true',
            ],
            'berat' => [
                'type' => 'DECIMAL',
                'constraint' => '5',
            ],
            'layanan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'tanggal_keluar' => [
                'type' => 'DATE',
                'null' => 'true',
            ],
            'biaya' => [
                'type' => 'DECIMAL',
                'constraint' => 10,
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
