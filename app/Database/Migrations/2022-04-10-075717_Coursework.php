<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Coursework extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 200
            ],
            'course' => [
                'type' => 'VARCHAR',
                'constraint' => 200
            ],
            'number' => [
                'type' => 'INT',
                'constraint' => 7
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('coursework');
    }

    public function down()
    {
        //
    }
}
