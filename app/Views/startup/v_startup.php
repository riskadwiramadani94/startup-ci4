<?= $this->extend('layout/v_layout') ?>
<?= $this->section('content') ?>

<div class="page-title">Startup</div>

<?php if (session()->getFlashdata('sukses')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('sukses') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="card-box">
    <div class="card-title"> Daftar Startup </div>
    <div class="d-flex justify-content-end mb-3">
        <a href="/startup/tambah_startup" class="btn btn-tambah">+ Tambah</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Startup</th>
                <th style="width:18%">Klaster</th>
                <th style="width:18%">Email</th>
                <th style="width:18%">Nomor WhatsApp</th>
                <th>Tahun Daftar</th>
                <th>Status Startup</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($startup as $i => $s): ?>
                <tr>

                    <td><?= $i + 1 ?></td>
                    <td>
                        <?=
                        esc($s['nama_perusahaan']) ?>
                        <div class="dropdown my-1">
                            <button class="btn btn-primary btn-sm dropdown-toggle px-4"
                                data-bs-toggle="dropdown">Pilih</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?= base_url('startup/detail_startup/' . $s['uuid']) ?>"><i class="bi bi-eye me-1"></i>Detail</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url('startup/ubah_startup/' . $s['uuid']) ?>"><i class="bi bi-pencil me-1"></i>Ubah</a></li>
                                    <li><a class="dropdown-item text-danger" href="javascript:void(0)" onclick="hapusStartup('<?= $s['uuid'] ?>')"><i class="bi bi-trash me-1"></i>Hapus</a></li>
                                </ul>
                        </div>
                    </td>
                    <td></td>
                    <td><?= esc($s['email']) ?></td>
                    <td><?= esc($s['nomor_whatsapp']) ?></td>
                    <td class="text-center"><?= esc($s['tahun_daftar']) ?></td>
                    <td class="text-center">
                        <span class="badge <?= $s['status'] === 'Aktif' ? 'bg-success' : 'bg-danger' ?>">
                            <?= esc($s['status']) ?>
                        </span>
                    </td>

                </tr>

            <?php
            endforeach; ?>

        </tbody>

    </table>

</div>

<!-- Modal Hapus -->
<div class="modal fade" id="modalHapus" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">Apakah Anda yakin data ini akan dihapus?</div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary" id="btnKonfirmasiHapus"><i class="bi bi-check me-1"></i> Ya</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x me-1"></i> Batal</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    const BASE_URL = '<?= base_url() ?>';
    var hapusUuid = null;

    function hapusStartup(uuid) {
        hapusUuid = uuid;
        $('#modalHapus').modal('show');
    }

    $('#btnKonfirmasiHapus').on('click', function() {
        $(this).prop('disabled', true).text('Menghapus...');
        $.ajax({
            url: BASE_URL + 'startup/hapus/' + hapusUuid,
            type: 'POST',
            data: {'<?= csrf_token() ?>': '<?= csrf_hash() ?>'},
            dataType: 'json',
            success: function(res) { if (res.status === 'ok') location.reload(); }
        });
    });
</script>

<?= $this->endSection() ?>