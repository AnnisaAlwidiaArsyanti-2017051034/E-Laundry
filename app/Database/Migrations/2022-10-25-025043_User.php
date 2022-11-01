<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengguna' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_pengguna' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
            'email_pengguna' => [
                'type' => 'VARCHAR',
                'constraint' => '30',
            ],
            'username_pengguna' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'password_pengguna' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'level_pengguna' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
        ]);
        $this->forge->addKey('id_pengguna', true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
