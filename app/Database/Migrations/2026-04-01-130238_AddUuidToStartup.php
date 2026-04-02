<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUuidToStartup extends Migration
{
    public function up()
    {
        $this->forge->addColumn('startup', [
            'uuid' => [
                'type' => 'VARCHAR',
                'constraint' => 36,
                'unique' => true,
                'null' => true,
                'after' => 'id'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('startup', 'uuid');
    }
}
