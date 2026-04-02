<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbKlasterTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'auto_increment' => true],
            'nama_klaster' => ['type' => 'VARCHAR', 'constraint' => 255],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('tb_klaster');
    }

    public function down(): void
    {
        $this->forge->dropTable('tb_klaster');
    }
}
