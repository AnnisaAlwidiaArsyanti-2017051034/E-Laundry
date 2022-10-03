<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Layanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'layanan_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'jenis_layanan' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'estimasi_waktu' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
            ],
            'tarif' => [
                'type' => 'INT',
                'constraint' => 7,
            ],
        ]);
        $this->forge->addKey('layanan_id', true);
        $this->forge->createTable('layanan');
    }

    public function down()
    {
        $this->forge->dropTable('layanan');
    }
}
