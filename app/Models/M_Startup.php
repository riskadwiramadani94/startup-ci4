<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Startup extends Model
{
    protected $table         = 'startup';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = true;

    /** @var list<string> */
    protected $allowedFields = [
        'uuid',
        'nama_perusahaan',
        'deskripsi_bidang_usaha',
        'tahun_berdiri',
        'target_pemasaran',
        'fokus_pelanggan',
        'alamat',
        'nomor_whatsapp',
        'email',
        'website',
        'linkedin',
        'instagram',
        'logo',
        'tahun_daftar',
        'status',
    ];
}
