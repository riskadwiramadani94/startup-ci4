<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Startup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background: #f0f2f5; font-family: 'Segoe UI', sans-serif; }

        .top-header {
            background: #1565c0;
            padding: 14px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-height: 58px;
        }
        .top-header .brand {
            color: #fff;
            font-size: 1.3rem;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .page-content { padding: 28px 32px; }
        .page-title { font-size: 1.3rem; font-weight: 600; margin-bottom: 20px; color: #222; }

        .card-box {
            background: #fff;
            border-radius: 10px;
            padding: 28px;
            box-shadow: 0 1px 6px rgba(0,0,0,0.08);
        }
        .card-box .card-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 16px;
            color: #333;
        }

        .table thead th {
            background: #f8f9fa;
            font-weight: 600;
            font-size: 0.88rem;
            vertical-align: middle;
            text-align: center;
            padding: 12px 10px;
            border-color: #dee2e6;
        }
        .table tbody td {
            font-size: 0.88rem;
            vertical-align: middle;
            padding: 10px 10px;
            border-color: #dee2e6;
        }
        .table tbody tr:hover { background: #f5f8ff; }

        .btn-tambah {
            background: #1565c0;
            color: #fff;
            border: none;
            padding: 8px 20px;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 500;
        }
        .btn-tambah:hover { background: #1251a3; color: #fff; }

        .badge-aktif {
            background: #28a745;
            color: #fff;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
        }
        .badge-nonaktif {
            background: #dc3545;
            color: #fff;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
        }
    </style>
</head>
<body>

<div class="top-header">
    <div class="brand">Startup</div>
</div>

<div class="page-content">
    <?= $this->renderSection('content') ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
