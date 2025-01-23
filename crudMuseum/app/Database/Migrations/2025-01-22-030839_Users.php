<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'           => 'BIGINT',
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'role' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => false,
            ],
        ]);

        $this->forge->addPrimaryKey('id_user'); // Establecer 'id_user' como clave primaria
        $this->forge->createTable('users');  // Crear la tabla 'users'
    }

    public function down()
    {
        $this->forge->dropTable('users');  // Eliminar la tabla 'users' si se revierte la migración
    }
}
