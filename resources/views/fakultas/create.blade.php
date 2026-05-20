<!DOCTYPE html>
<html>
<head>
    <title>Tambah Fakultas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3>Tambah Fakultas</h3>
        </div>

        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>Data gagal disimpan!</strong>
                    <ul class="mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/fakultas" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Fakultas</label>
                    <input type="text" name="nama_fakultas" class="form-control" value="{{ old('nama_fakultas') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Dekan</label>
                    <input type="text" name="nama_dekan" class="form-control" value="{{ old('nama_dekan') }}">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/fakultas" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>