<?php

namespace App\Models;

use CodeIgniter\Model;

class M_StartupKlaster extends Model
{
    protected $table      = 'startup_klaster';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    /** @var list<string> */
    protected $allowedFields = ['startup_id', 'klaster_id'];

    // Ambil semua klaster milik 1 startup
    public function getKlasterByStartup(int $startupId): array
    {
        $rows = $this->select('klaster_id')->where('startup_id', $startupId)->findAll();
        return array_column($rows, 'klaster_id');
    }

    // Simpan ulang klaster startup (hapus lama, insert baru)
    public function simpanKlaster(int $startupId, array $klasterIds): void
    {
        $this->where('startup_id', $startupId)->delete();
        foreach ($klasterIds as $klasterId) {
            $this->insert(['startup_id' => $startupId, 'klaster_id' => $klasterId]);
        }
    }

    public function getKlasterNamaByStartup(int $startupId): array
    {
        return $this->select('tb_klaster.nama_klaster')
            ->join('tb_klaster', 'tb_klaster.id = startup_klaster.klaster_id')
            ->where('startup_id', $startupId)
            ->findAll();
    }
}
