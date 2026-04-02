<?php

namespace App\Controllers;

use App\Models\M_Startup;
use App\Models\M_Klaster;
use App\Models\M_StartupKlaster;
use App\Models\M_StartupTim;

class Startup extends BaseController
{
    protected M_Startup $model;
    protected M_Klaster $klaster_model;
    protected M_StartupKlaster $startup_klaster_model;
    protected M_StartupTim $tim_model;

    public function __construct()
    {
        $this->model                 = new M_Startup();
        $this->klaster_model         = new M_Klaster();
        $this->startup_klaster_model = new M_StartupKlaster();
        $this->tim_model             = new M_StartupTim();
    }

    public function index()
    {
        $data = ['startup' => $this->model->findAll()];
        return view('startup/v_startup', $data);
    }

    public function tambah_startup()
    {
        $data = ['klasters' => $this->klaster_model->findAll()];
        return view('startup/v_tambah_startup', $data);
    }

    public function simpan()
    {
        helper('uuid');

        $logo = null;
        $file = $this->request->getFile('logo');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $logo = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/logo', $logo);
        }

        $data = $this->request->getPost();

        $startup_id = $this->model->insert([
            'uuid'                   => generate_uuid(),
            'nama_perusahaan'        => $data['nama_perusahaan'],
            'deskripsi_bidang_usaha' => $data['deskripsi_bidang_usaha'],
            'tahun_berdiri'          => $data['tahun_berdiri'] ?: null,
            'target_pemasaran'       => $data['target_pemasaran'],
            'fokus_pelanggan'        => $data['fokus_pelanggan'],
            'alamat'                 => $data['alamat'],
            'nomor_whatsapp'         => $data['nomor_whatsapp'],
            'email'                  => $data['email'],
            'website'                => $data['website'],
            'linkedin'               => $data['linkedin'],
            'instagram'              => $data['instagram'],
            'logo'                   => $logo,
            'tahun_daftar'           => $data['tahun_daftar'] ?: null,
            'status'                 => 'Aktif',
        ], true);

        $this->startup_klaster_model->simpanKlaster($startup_id, $data['klaster'] ?? []);

        session()->setFlashdata('sukses', 'Data berhasil disimpan!');
        return $this->response->setJSON(['status' => 'ok']);
    }

    public function ubah_startup($uuid)
    {
        if (!$this->is_valid_uuid($uuid)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Link tidak valid');
        }

        $startup = $this->model->where('uuid', $uuid)->first();

        if (!$startup) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Startup tidak ditemukan atau telah dihapus');
        }

        $data = [
            'startup'         => $startup,
            'klasters'        => $this->klaster_model->findAll(),
            'klaster_startup' => $this->startup_klaster_model->getKlasterByStartup($startup['id']),
        ];
        return view('startup/v_ubah_startup', $data);
    }

    public function update()
    {
        $data = $this->request->getPost();

        $logo = $data['logo_lama'];
        $file = $this->request->getFile('logo');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $logo = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/logo', $logo);
        }

        $this->model->update($data['id'], [
            'nama_perusahaan'        => $data['nama_perusahaan'],
            'deskripsi_bidang_usaha' => $data['deskripsi_bidang_usaha'],
            'tahun_berdiri'          => $data['tahun_berdiri'] ?: null,
            'target_pemasaran'       => $data['target_pemasaran'],
            'fokus_pelanggan'        => $data['fokus_pelanggan'],
            'alamat'                 => $data['alamat'],
            'nomor_whatsapp'         => $data['nomor_whatsapp'],
            'email'                  => $data['email'],
            'website'                => $data['website'],
            'linkedin'               => $data['linkedin'],
            'instagram'              => $data['instagram'],
            'logo'                   => $logo,
            'tahun_daftar'           => $data['tahun_daftar'] ?: null,
            'status'                 => $data['status'],
        ]);

        $this->startup_klaster_model->simpanKlaster($data['id'], $data['klaster'] ?? []);

        session()->setFlashdata('sukses', 'Data berhasil diubah!');
        return $this->response->setJSON(['status' => 'ok']);
    }

    public function detail_startup($uuid)
    {
        if (!$this->is_valid_uuid($uuid)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Link tidak valid');
        }

        $startup = $this->model->where('uuid', $uuid)->first();

        if (!$startup) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Startup tidak ditemukan atau telah dihapus');
        }

        $data = [
            'startup'         => $startup,
            'klaster_startup' => $this->startup_klaster_model->getKlasterNamaByStartup($startup['id']),
            'tim'             => $this->tim_model->getByStartup($startup['id']),
        ];
        return view('startup/v_detail_startup', $data);
    }

    public function simpan_tim()
    {
        $data = $this->request->getPost();

        $this->tim_model->insert([
            'startup_id'            => $data['startup_id'],
            'nama_lengkap'          => $data['nama_lengkap'],
            'jabatan'               => $data['jabatan'],
            'jenis_kelamin'         => $data['jenis_kelamin'],
            'nomor_whatsapp'        => $data['nomor_whatsapp'],
            'email'                 => $data['email'],
            'linkedin'              => $data['linkedin'],
            'instagram'             => $data['instagram'],
            'nama_perguruan_tinggi' => $data['nama_perguruan_tinggi'],
        ]);

        session()->setFlashdata('sukses', 'Anggota tim berhasil ditambahkan!');
        return $this->response->setJSON(['status' => 'ok']);
    }

    public function update_tim($id)
    {
        $data = $this->request->getPost();

        $this->tim_model->update($id, [
            'nama_lengkap'          => $data['nama_lengkap'],
            'jabatan'               => $data['jabatan'],
            'jenis_kelamin'         => $data['jenis_kelamin'],
            'nomor_whatsapp'        => $data['nomor_whatsapp'],
            'email'                 => $data['email'],
            'linkedin'              => $data['linkedin'],
            'instagram'             => $data['instagram'],
            'nama_perguruan_tinggi' => $data['nama_perguruan_tinggi'],
        ]);

        session()->setFlashdata('sukses', 'Anggota tim berhasil diubah!');
        return $this->response->setJSON(['status' => 'ok']);
    }

    public function hapus($uuid)
    {
        $startup = $this->model->where('uuid', $uuid)->first();

        if (!$startup) {
            return $this->response->setJSON(['status' => 'error']);
        }

        // Hapus relasi klaster & tim
        $this->startup_klaster_model->where('startup_id', $startup['id'])->delete();
        $this->tim_model->where('startup_id', $startup['id'])->delete();

        $this->model->delete($startup['id']);

        session()->setFlashdata('sukses', 'Data berhasil dihapus!');
        return $this->response->setJSON(['status' => 'ok']);
    }

    public function hapus_tim($id)
    {
        $this->tim_model->delete($id);
        session()->setFlashdata('sukses', 'Anggota tim berhasil dihapus!');
        return $this->response->setJSON(['status' => 'ok']);
    }

    private function is_valid_uuid($uuid)
    {
        return preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i', $uuid);
    }
}
