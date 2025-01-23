<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Museums extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_mus' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'museum_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);

        $this->forge->addKey('id_mus', true); // Clave primaria
        $this->forge->createTable('museums'); // Nombre de la tabla
    }

    public function down()
    {
        $this->forge->dropTable('museums');
    }
}
