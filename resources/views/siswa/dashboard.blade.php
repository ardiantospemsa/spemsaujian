<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Dashboard Siswa</h2>
        <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
    </div>

    <!-- Card daftar ujian -->
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Daftar Ujian</h3>
        </div>
        <div class="card-body">
            @if($ujians->count() > 0)
                <ul class="list-group">
                    @foreach($ujians as $ujian)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $ujian->judul }}
                            <a href="{{ $ujian->link }}" target="_blank" class="btn btn-sm btn-success">Kerjakan</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">Belum ada ujian tersedia.</p>
            @endif
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
