<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStartupKlasterTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'auto_increment' => true],
            'startup_id' => ['type' => 'INT'],
            'klaster_id' => ['type' => 'INT'],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('startup_id', 'startup', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('klaster_id', 'tb_klaster', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('startup_klaster');
    }

    public function down(): void
    {
        $this->forge->dropTable('startup_klaster');
    }
}
