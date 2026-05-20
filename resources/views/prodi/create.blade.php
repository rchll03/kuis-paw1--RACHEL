<!DOCTYPE html>
<html>
<head>
    <title>Tambah Prodi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h3>Tambah Prodi</h3>
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

            <form action="/prodi" method="POST">

                @csrf

                <div class="mb-3">
                    <label>Nama Prodi</label>

                    <input type="text" name="nama_prodi" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Nama Kaprodi</label>

                    <input type="text" name="nama_kaprodi" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Alias Prodi</label>

                    <input type="text" name="alias_prodi" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

                <a href="/prodi" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>

</body>
</html>