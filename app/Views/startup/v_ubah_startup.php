<?= $this->extend('layout/v_layout') ?>
<?= $this->section('content') ?>

<style>
    .form-label-col {
        width: 200px;
        min-width: 200px;
        font-size: 0.9rem;
        padding-top: 7px;
        color: #333;
    }

    .form-input-col {
        flex: 1;
        max-width: 520px;
    }

    .form-row-item {
        display: flex;
        margin-bottom: 18px;
        margin-bottom: 18px;
    }

    .required {
        color: red;
    }
</style>

<div class="page-title">Startup</div>

<div class="card-box">
    <div class="card-title mb-4">Ubah Startup</div>

    <form id="formUbah">
        <?= csrf_field() ?>
        <input type="hidden" name="id" value="<?= $startup['id'] ?>">
        <input type="hidden" name="logo_lama" value="<?= $startup['logo'] ?>">

        <div class="form-row-item">
            <div class="form-label-col">Nama Perusahaan <span class="required">*</span></div>
            <div class="form-input-col">
                <input type="text" name="nama_perusahaan" class="form-control" value="<?= esc($startup['nama_perusahaan']) ?>" required>
            </div>
        </div>

        <div class="form-row-item">
            <div class="form-label-col">Deskripsi Bidang Usaha <span class="required">*</span></div>
            <div class="form-input-col">
                <textarea name="deskripsi_bidang_usaha" class="form-control" rows="5" required><?= esc($startup['deskripsi_bidang_usaha']) ?></textarea>
            </div>
        </div>

        <div class="form-row-item">
            <div class="form-label-col">Klaster <span class="required">*</span></div>
            <div class="form-input-col">
                <?php foreach ($klasters as $k): ?>
                    <div class="form-check mb-1">
                        <input class="form-check-input" type="checkbox" name="klaster[]" value="<?= $k['id'] ?>" id="k_<?= $k['id'] ?>" <?= in_array($k['id'], $klaster_startup) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="k_<?= $k['id'] ?>"><?= esc($k['nama_klaster']) ?></label>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="form-row-item">
            <div class="form-label-col">Tahun Berdiri</div>
            <div class="form-input-col">
                <select name="tahun_berdiri" class="form-select" style="max-width:220px">
                    <option value="">Pilih Tahun Berdiri</option>
                    <?php for ($y = date('Y'); $y >= 2000; $y--): ?>
                        <option value="<?= $y ?>" <?= $startup['tahun_berdiri'] == $y ? 'selected' : '' ?>><?= $y ?></option>
                    <?php endfor; ?>
                </select>
            </div>
        </div>

        <div class="form-row-item">
            <div class="form-label-col">Target Pemasaran</div>
            <div class="form-input-col">
                <input type="text" name="target_pemasaran" class="form-control" value="<?= esc($startup['target_pemasaran']) ?>">
            </div>
        </div>

        <div class="form-row-item">
            <div class="form-label-col">Fokus Pelanggan</div>
            <div class="form-input-col">
                <input type="text" name="fokus_pelanggan" class="form-control" value="<?= esc($startup['fokus_pelanggan']) ?>">
            </div>
        </div>

        <div class="form-row-item">
            <div class="form-label-col">Alamat</div>
            <div class="form-input-col">
                <textarea name="alamat" class="form-control" rows="4"><?= esc($startup['alamat']) ?></textarea>
            </div>
        </div>

        <div class="form-row-item">
            <div class="form-label-col">Nomor WhatsApp</div>
            <div class="form-input-col">
                <input type="text" name="nomor_whatsapp" class="form-control" style="max-width:220px" value="<?= esc($startup['nomor_whatsapp']) ?>">
            </div>
        </div>

        <div class="form-row-item">
            <div class="form-label-col">Email Perusahaan</div>
            <div class="form-input-col">
                <input type="email" name="email" class="form-control" style="max-width:220px" value="<?= esc($startup['email']) ?>">
            </div>
        </div>

        <div class="form-row-item">
            <div class="form-label-col">Website Perusahaan</div>
            <div class="form-input-col">
                <input type="text" name="website" class="form-control" style="max-width:220px" value="<?= esc($startup['website']) ?>">
            </div>
        </div>

        <div class="form-row-item">
            <div class="form-label-col">Linkedin Perusahaan</div>
            <div class="form-input-col">
                <input type="text" name="linkedin" class="form-control" style="max-width:220px" value="<?= esc($startup['linkedin']) ?>">
            </div>
        </div>

        <div class="form-row-item">
            <div class="form-label-col">Instagram Perusahaan</div>
            <div class="form-input-col">
                <input type="text" name="instagram" class="form-control" style="max-width:220px" value="<?= esc($startup['instagram']) ?>">
            </div>
        </div>

        <div class="form-row-item">
            <div class="form-label-col">Logo Perusahaan</div>
            <div class="form-input-col">
                <?php if (!empty($startup['logo'])): ?>
                    <img src="/uploads/logo/<?= $startup['logo'] ?>" height="60" class="mb-2 d-block">
                <?php endif; ?>
                <input type="file" name="logo" class="form-control" accept=".jpg,.jpeg,.png" style="max-width:280px">
                <small class="text-muted">Format File : .jpg, .jpeg, .png.</small>
            </div>
        </div>

        <div class="form-row-item">
            <div class="form-label-col">Tahun Daftar <span class="required">*</span></div>
            <div class="form-input-col">
                <select name="tahun_daftar" class="form-select" style="max-width:220px" required>
                    <option value="">Pilih Tahun Daftar</option>
                    <?php for ($y = date('Y'); $y >= 2000; $y--): ?>
                        <option value="<?= $y ?>" <?= $startup['tahun_daftar'] == $y ? 'selected' : '' ?>><?= $y ?></option>
                    <?php endfor; ?>
                </select>
            </div>
        </div>

        <div class="form-row-item">
            <div class="form-label-col">Status Startup <span class="required">*</span></div>
            <div class="form-input-col">
                <select name="status" class="form-select" style="max-width: 220px" required>
                    <option value="">Pilih Status Startup</option>
                    <option value="Aktif" <?= $startup['status'] == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                    <option value="Tidak Aktif" <?= $startup['status'] == 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif</option> 
                </select>
            </div>
        </div>

        <div class="mt-3 mb-2">
            <button type="submit" class="btn btn-primary px-4" id="btnSimpan">
                <i class="bi bi-save me-1"></i> Simpan
            </button>
            <a href="/startup" class="btn btn-outline-secondary px-4 ms-2">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>

    </form>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        const BASE_URL = '<?= base_url() ?>';
        $('#formUbah').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            formData.delete('klaster[]');
            $('input[name="klaster[]"]:checked').each(function() {
                formData.append('klaster[]', $(this).val());
            });

            $('#btnSimpan').prop('disabled', true).html('<i class="bi bi-save me-1"></i> Menyimpan...');

            $.ajax({
                url: BASE_URL + 'startup/update',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(res) {
                    if (res.status === 'ok') {
                        window.location.href = BASE_URL + 'startup';
                    }
                },
                error: function() {
                    $('#btnSimpan').prop('disabled', false).html('<i class="bi bi-save me-1"></i> Simpan');
                }
            });
        });
    </script>
</div>

<?= $this->endSection() ?>