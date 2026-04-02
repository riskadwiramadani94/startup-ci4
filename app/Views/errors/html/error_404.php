<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= lang('Errors.pageNotFound') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            background: #f0f2f5;
            font-family: 'Segoe UI', sans-serif;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .error-container {
            max-width: 600px;
            background: #fff;
            padding: 60px 40px;
            border-radius: 10px;
            box-shadow: 0 1px 6px rgba(0,0,0,0.08);
            text-align: center;
        }
        .error-icon {
            color: #ff6b35;
            font-size: 4rem;
            margin-bottom: 20px;
        }
        h1 {
            font-size: 2.5rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
        }
        .error-message {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 30px;
            line-height: 1.5;
        }
        .btn-home {
            background: #1565c0;
            color: #fff;
            border: none;
            padding: 12px 24px;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            margin-right: 10px;
        }
        .btn-home:hover {
            background: #1251a3;
            color: #fff;
        }
        .btn-back {
            background: transparent;
            color: #666;
            border: 1px solid #ddd;
            padding: 12px 24px;
            border-radius: 6px;
            font-size: 1rem;
            text-decoration: none;
            display: inline-block;
        }
        .btn-back:hover {
            background: #f8f9fa;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-icon">
            <i class="bi bi-exclamation-triangle"></i>
        </div>
        
        <h1>Halaman Tidak Ditemukan</h1>
        
        <div class="error-message">
            <?php if (ENVIRONMENT !== 'production') : ?>
                <?= nl2br(esc(is_string($message) ? $message : 'Terjadi kesalahan pada sistem')) ?>
            <?php else : ?>
                Maaf, halaman yang Anda cari tidak tersedia atau telah dipindahkan.
            <?php endif; ?>
        </div>
        
        <div>
            <a href="/startup" class="btn-home">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Startup
            </a>
            <a href="/" class="btn-back">
                <i class="bi bi-house me-1"></i> Beranda
            </a>
        </div>
    </div>
</body>
</html>
