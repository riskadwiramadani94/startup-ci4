<?= $this->extend('layout/v_layout') ?>
<?= $this->section('content') ?>

<div class="page-title">Detail Startup</div>

<?php if (session()->getFlashdata('sukses')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('sukses') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="d-flex gap-3 align-items-start">

    <!--KOLOM KIRI-->
    <div class="card-box" style="width: 280px; min-width:280px; text-align:center">
        <div class="d-flex justify-content-end">
            <div class="dropdown">
                <button class="btn btn-sm" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="/startup"><i class="bi bi-arrow-left me-1"></i>Kembali</a></li>
                </ul>
            </div>
        </div>

        <?php if (!empty($startup['logo'])): ?>
            <img src="/uploads/logo/<?= $startup['logo'] ?>" style="width:100px;height:100px;object-fit:contain;" class="d-block mx-auto mb-3">
        <?php else: ?>
            <div style="width:100px;height:100px;background:#eee;border-radius:8px;" class="d-flex align-items-center justify-content-center mx-auto mb-3">
                <i class="bi bi-image text-muted" style="font-size:2rem"></i>
            </div>
        <?php endif; ?>

        <h6 class="fw-bold"><?= esc($startup['nama_perusahaan']) ?></h6>

        <div class="text-start mt-3" style="font-size: 0.85rem; color:#555">
            <p><strong>Deskripsi:</strong><br><?= esc($startup['deskripsi_bidang_usaha']) ?></p>

            <p class="mt-2"><strong>Klaster :</strong><br>
                <?php foreach ($klaster_startup as $k): ?>
                    <span class="badge bg-dark"><?= esc($k['nama_klaster']) ?></span>
                <?php endforeach; ?>
            </p>

            <p class="mt-2"><strong>Tahun Berdiri :</strong>
                <span class="badge bg-secondary"><?= esc($startup['tahun_berdiri']) ?></span>
            </p>
            <p><strong>Tahun Daftar :</strong>
                <span class="badge bg-secondary"><?= esc($startup['tahun_daftar']) ?></span>
            </p>
            <p><strong>Status Startup :</strong>
                <span class="badge bg-success"><?= esc($startup['status']) ?></span>
            </p>
        </div>

        <div class="mt-3 d-flex justify-content-center gap-2">
            <?php if (!empty($startup['email'])): ?>
                <a href="mailto:<?= esc($startup['email']) ?>" class="btn btn-outline-danger rounded-circle" style="width:40px;height:40px;padding:6px">
                    <i class="bi bi-envelope"></i>
                </a>
            <?php endif; ?>
            <?php if (!empty($startup['website'])): ?>
                <a href="<?= esc($startup['website']) ?>" target="_blank" class="btn btn-outline-primary rounded-circle" style="width:40px;height:40px;padding:6px">
                    <i class="bi bi-globe2"></i>
                </a>
            <?php endif; ?>
        </div>
    </div>

    <!-- KOLOM KANAN -->
    <div class="card-box flex-grow-1">

        <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
                <a class="nav-link active" href="#"><i class="bi bi-house me-1"></i>Startup</a>
            </li>
        </ul>

        <!-- Informasi Startup -->
        <div class="d-flex justify-content-between align-items-center mb-2 p-2" style="background:#f0f0f0; border-radius:4px">
            <strong><i class="bi bi-list me-1"></i> INFORMASI STARTUP</strong>
            <a href="/startup/ubah_startup/<?= $startup['uuid'] ?>" class="btn btn-primary btn-sm">
                <i class="bi bi-pencil"></i>
            </a>
        </div>
        <table class="table table-borderless" style="font-size:0.9rem">
            <tr>
                <td style="width:200px; color:#555">Target Pemasaran</td>
                <td><?= esc($startup['target_pemasaran']) ?: '-' ?></td>
            </tr>
            <tr>
                <td style="color:#555">Fokus Pelanggan</td>
                <td><?= esc($startup['fokus_pelanggan']) ?: '-' ?></td>
            </tr>
            <tr>
                <td style="color:#555">Alamat</td>
                <td><?= esc($startup['alamat']) ?: '-' ?></td>
            </tr>
        </table>

        <!-- Informasi Tim -->
        <div class="d-flex justify-content-between align-items-center mb-2 mt-3 p-2" style="background:#f0f0f0; border-radius:4px">
            <strong><i class="bi bi-list me-1"></i> INFORMASI TIM</strong>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahTim">
                <i class="bi bi-plus"></i>
            </button>
        </div>
        <table class="table table-bordered" style="font-size:0.9rem">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Lengkap</th>
                    <th>Jabatan</th>
                    <th>Jenis Kelamin</th>
                    <th>No. WhatsApp</th>
                    <th>Email</th>
                    <th>Linkedin</th>
                    <th>Instagram</th>
                    <th>Nama Perguruan Tinggi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($tim)): ?>
                    <tr><td colspan="10" class="text-center text-muted">Belum ada data tim</td></tr>
                <?php else: ?>
                    <?php foreach ($tim as $i => $t): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= esc($t['nama_lengkap']) ?></td>
                            <td><?= esc($t['jabatan']) ?></td>
                            <td><?= esc($t['jenis_kelamin']) ?></td>
                            <td><?= esc($t['nomor_whatsapp']) ?></td>
                            <td><?= esc($t['email']) ?></td>
                            <td><?= esc($t['linkedin']) ?></td>
                            <td><?= esc($t['instagram']) ?></td>
                            <td><?= esc($t['nama_perguruan_tinggi']) ?></td>
                            <td style="white-space:nowrap">
                                <button class="btn btn-primary btn-sm me-1" onclick="ubahTim(<?= $t['id'] ?>, '<?= esc($t['nama_lengkap']) ?>', '<?= esc($t['jabatan']) ?>', '<?= esc($t['jenis_kelamin']) ?>', '<?= esc($t['nomor_whatsapp']) ?>', '<?= esc($t['email']) ?>', '<?= esc($t['linkedin']) ?>', '<?= esc($t['instagram']) ?>', '<?= esc($t['nama_perguruan_tinggi']) ?>')"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-danger btn-sm" onclick="hapusTim(<?= $t['id'] ?>)"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

    </div>

</div>

<!-- Modal Tambah Tim -->
<div class="modal fade" id="modalTambahTim" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Tim Startup</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formTambahTim">
                    <?= csrf_field() ?>
                    <input type="hidden" name="startup_id" value="<?= $startup['id'] ?>">
                    <div class="mb-3"><label>Nama Lengkap <span class="text-danger">*</span></label><input type="text" name="nama_lengkap" class="form-control" required></div>
                    <div class="mb-3"><label>Jabatan <span class="text-danger">*</span></label><input type="text" name="jabatan" class="form-control" required></div>
                    <div class="mb-3"><label>Jenis Kelamin <span class="text-danger">*</span></label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3"><label>No. WhatsApp</label><input type="text" name="nomor_whatsapp" class="form-control"></div>
                    <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control"></div>
                    <div class="mb-3"><label>Linkedin</label><input type="text" name="linkedin" class="form-control"></div>
                    <div class="mb-3"><label>Instagram</label><input type="text" name="instagram" class="form-control"></div>
                    <div class="mb-3"><label>Nama Perguruan Tinggi</label><input type="text" name="nama_perguruan_tinggi" class="form-control"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnSimpanTim"><i class="bi bi-save me-1"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Tim -->
<div class="modal fade" id="modalHapusTim" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">Apakah Anda yakin data ini akan dihapus?</div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary" id="btnKonfirmasiHapusTim"><i class="bi bi-check me-1"></i> Ya</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x me-1"></i> Batal</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ubah Tim -->
<div class="modal fade" id="modalUbahTim" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Tim Startup</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formUbahTim">
                    <?= csrf_field() ?>
                    <input type="hidden" id="ubah_tim_id">
                    <div class="mb-3"><label>Nama Lengkap <span class="text-danger">*</span></label><input type="text" id="ubah_nama_lengkap" name="nama_lengkap" class="form-control" required></div>
                    <div class="mb-3"><label>Jabatan <span class="text-danger">*</span></label><input type="text" id="ubah_jabatan" name="jabatan" class="form-control" required></div>
                    <div class="mb-3"><label>Jenis Kelamin <span class="text-danger">*</span></label>
                        <select id="ubah_jenis_kelamin" name="jenis_kelamin" class="form-select" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3"><label>No. WhatsApp</label><input type="text" id="ubah_nomor_whatsapp" name="nomor_whatsapp" class="form-control"></div>
                    <div class="mb-3"><label>Email</label><input type="email" id="ubah_email" name="email" class="form-control"></div>
                    <div class="mb-3"><label>Linkedin</label><input type="text" id="ubah_linkedin" name="linkedin" class="form-control"></div>
                    <div class="mb-3"><label>Instagram</label><input type="text" id="ubah_instagram" name="instagram" class="form-control"></div>
                    <div class="mb-3"><label>Nama Perguruan Tinggi</label><input type="text" id="ubah_nama_perguruan_tinggi" name="nama_perguruan_tinggi" class="form-control"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnUpdateTim"><i class="bi bi-save me-1"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    const BASE_URL = '<?= base_url() ?>';
    $('#btnSimpanTim').on('click', function() {
        var formData = new FormData($('#formTambahTim')[0]);
        $(this).prop('disabled', true).html('<i class="bi bi-save me-1"></i> Menyimpan...');
        $.ajax({
            url: BASE_URL + 'startup/simpan_tim',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(res) { if (res.status === 'ok') location.reload(); },
            error: function() { $('#btnSimpanTim').prop('disabled', false).html('<i class="bi bi-save me-1"></i> Simpan'); }
        });
    });

    function ubahTim(id, nama, jabatan, jk, wa, email, linkedin, instagram, pt) {
        $('#ubah_tim_id').val(id);
        $('#ubah_nama_lengkap').val(nama);
        $('#ubah_jabatan').val(jabatan);
        $('#ubah_jenis_kelamin').val(jk);
        $('#ubah_nomor_whatsapp').val(wa);
        $('#ubah_email').val(email);
        $('#ubah_linkedin').val(linkedin);
        $('#ubah_instagram').val(instagram);
        $('#ubah_nama_perguruan_tinggi').val(pt);
        $('#modalUbahTim').modal('show');
    }

    $('#btnUpdateTim').on('click', function() {
        var id = $('#ubah_tim_id').val();
        var formData = new FormData($('#formUbahTim')[0]);
        $(this).prop('disabled', true).html('<i class="bi bi-save me-1"></i> Menyimpan...');
        $.ajax({
            url: BASE_URL + 'startup/update_tim/' + id,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(res) { if (res.status === 'ok') location.reload(); },
            error: function() { $('#btnUpdateTim').prop('disabled', false).html('<i class="bi bi-save me-1"></i> Simpan'); }
        });
    });

    var hapusTimId = null;
    function hapusTim(id) {
        hapusTimId = id;
        $('#modalHapusTim').modal('show');
    }

    $('#btnKonfirmasiHapusTim').on('click', function() {
        $(this).prop('disabled', true).text('Menghapus...');
        $.ajax({
            url: BASE_URL + 'startup/hapus_tim/' + hapusTimId,
            type: 'POST',
            data: {'<?= csrf_token() ?>': '<?= csrf_hash() ?>'},
            dataType: 'json',
            success: function(res) { if (res.status === 'ok') location.reload(); }
        });
    });
</script>

<?= $this->endSection() ?>
