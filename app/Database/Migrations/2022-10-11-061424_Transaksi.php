<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_transaksi' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'no_invoice' => [
                'type'           => 'CHAR',
                'constraint'     => '10',
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
            ],
            'berat' => [
                'type' => 'DECIMAL',
                'constraint' => '4,2',
            ],
            'layanan' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
            ],
            'tanggal_keluar' => [
                'type' => 'DATE',
            ],
            'biaya' => [
                'type' => 'DECIMAL',
                'constraint' => '10,0',
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
        $this->forge->addKey('id_transaksi', true);
        $this->forge->createTable('transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi');
    }
}
