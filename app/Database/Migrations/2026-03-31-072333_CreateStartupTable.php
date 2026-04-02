<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStartupTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id'                     => ['type' => 'INT', 'auto_increment' => true],
            'nama_perusahaan'        => ['type' => 'VARCHAR', 'constraint' => 255],
            'deskripsi_bidang_usaha' => ['type' => 'TEXT', 'null' => true],
            'klaster'                => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'tahun_berdiri'          => ['type' => 'YEAR', 'null' => true],
            'target_pemasaran'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'fokus_pelanggan'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'dosen_pembina'          => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'program_diikuti'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'alamat'                 => ['type' => 'TEXT', 'null' => true],
            'nomor_whatsapp'         => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'email'                  => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'website'                => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'linkedin'               => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'instagram'              => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'logo'                   => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'tahun_daftar'           => ['type' => 'YEAR', 'null' => true],
            'status'                 => ['type' => 'ENUM', 'constraint' => ['Aktif', 'Tidak Aktif'], 'default' => 'Aktif'],
            'created_at'             => ['type' => 'DATETIME', 'null' => true],
            'updated_at'             => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('startup');
    }

    public function down(): void
    {
        $this->forge->dropTable('startup');
    }
}
