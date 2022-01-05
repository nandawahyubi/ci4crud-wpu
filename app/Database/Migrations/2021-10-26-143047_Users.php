<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                 => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'email'          => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique'     => 'true',
            ],
            'password'       => [
                'type'       => 'VARCHAR',
                'constraint' => '300',
            ],
            'no_telp'        => [
                'type'       => 'INT',
                'constraint' => '20',
                'unsigned'   => true,
            ],
            'address'  => [
                'type' => 'TEXT',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
