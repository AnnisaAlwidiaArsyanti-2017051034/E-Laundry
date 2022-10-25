<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '30',
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'level' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
        ]);
        $this->forge->addKey('user_id', true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
