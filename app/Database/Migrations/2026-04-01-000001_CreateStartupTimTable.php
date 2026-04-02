<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStartupTimTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                    => ['type' => 'INT', 'auto_increment' => true],
            'startup_id'            => ['type' => 'INT'],
            'nama_lengkap'          => ['type' => 'VARCHAR', 'constraint' => 100],
            'jabatan'               => ['type' => 'VARCHAR', 'constraint' => 100],
            'jenis_kelamin'         => ['type' => 'ENUM', 'constraint' => ['Laki-laki', 'Perempuan']],
            'nomor_whatsapp'        => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'email'                 => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'linkedin'              => ['type' => 'VARCHAR', 'constraint' => 200, 'null' => true],
            'instagram'             => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'nama_perguruan_tinggi' => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('startup_id', 'startup', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('startup_tim');
    }

    public function down()
    {
        $this->forge->dropTable('startup_tim');
    }
}
