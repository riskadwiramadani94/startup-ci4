<?php

namespace App\Models;

use CodeIgniter\Model;

class M_StartupTim extends Model
{
    protected $table      = 'startup_tim';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'startup_id', 'nama_lengkap', 'jabatan', 'jenis_kelamin',
        'nomor_whatsapp', 'email', 'linkedin', 'instagram', 'nama_perguruan_tinggi',
    ];

    public function getByStartup(int $startupId): array
    {
        return $this->where('startup_id', $startupId)->findAll();
    }
}
