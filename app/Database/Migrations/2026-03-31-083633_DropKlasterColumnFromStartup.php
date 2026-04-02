<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DropKlasterColumnFromStartup extends Migration
{
    public function up(): void
    {
        $this->forge->dropColumn('startup', 'klaster');
    }

    public function down(): void
    {
        $this->forge->addColumn('startup', [
            'klaster' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true, 'after' => 'deskripsi_bidang_usaha'],
        ]);
    }
}
