<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Dashboard Admin</h2>
        <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <!-- Form Tambah Siswa -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-3">Tambah Siswa</h4>
                    <form method="POST" action="{{ route('admin.siswa.tambah') }}">
                        @csrf
                        <div class="mb-2">
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="mb-2">
                            <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                        </div>
                        <div class="mb-2">
                            <input type="text" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <button class="btn btn-primary w-100" type="submit">Simpan Siswa</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Form Tambah Ujian -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-3">Tambah Ujian</h4>
                    <form method="POST" action="{{ route('admin.ujian.tambah') }}">
                        @csrf
                        <div class="mb-2">
                            <input type="text" name="judul" class="form-control" placeholder="Judul Ujian" required>
                        </div>
                        <div class="mb-2">
                            <input type="url" name="link" class="form-control" placeholder="Link Google Form" required>
                        </div>
                        <button class="btn btn-primary w-100" type="submit">Simpan Ujian</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Siswa -->
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <h4 class="card-title mb-3">Daftar Siswa</h4>
        <ul class="list-group">
            @foreach($siswas as $siswa)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>{{ $siswa->nama }}</span>

                <form action="{{ route('admin.siswa.hapus', $siswa->id) }}" 
                      method="POST" 
                      onsubmit="return confirm('Yakin ingin menghapus siswa ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        Hapus
                    </button>
                </form>

            </li>
            @endforeach
        </ul>
    </div>
</div>


    <!-- Daftar Ujian -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h4 class="card-title mb-3">Daftar Ujian</h4>
            <ul class="list-group">
                @foreach($ujians as $ujian)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $ujian->judul }}</span>
                    <div>
                        <form action="{{ route('admin.ujian.hapus', $ujian->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus ujian ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
