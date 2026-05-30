<!DOCTYPE html>
<html>

<head>
    <title>Edit Fakultas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h1 class="mb-4">Edit Fakultas</h1>

        <form action="/fakultas/{{ $fakultas->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Fakultas</label>
                <input type="text" name="nama_fakultas" class="form-control" value="{{ $fakultas->nama_fakultas }}">
            </div>

            <button type="submit" class="btn btn-success">
                Update
            </button>

            <a href="/fakultas" class="btn btn-secondary">
                Kembali
            </a>
        </form>

    </div>

</body>

</html>
