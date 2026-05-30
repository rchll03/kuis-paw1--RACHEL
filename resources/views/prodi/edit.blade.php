<!DOCTYPE html>
<html>

<head>
    <title>Edit Prodi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-warning">
                <h3>Edit Fakultas</h3>
            </div>

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Data gagal diupdate!</strong>
                        <ul class="mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/prodi/{{ $prodi->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>Nama Prodi</label>
                        <input type="text" name="nama_prodi" class="form-control" value="{{ $prodi->nama_prodi }}" />
                    </div>

                    <div class="mb-3">
                        <label>Nama Kaprodi</label>

                        <input type="text" name="nama_kaprodi" class="form-control"
                            value="{{ $prodi->nama_kaprodi }}" />
                    </div>

                    <div class="mb-3">
                        <label>Alias Prodi</label>

                        <input type="text" name="alias_prodi" class="form-control"
                            value="{{ $prodi->alias_prodi }}" />
                    </div>
                    <div class="mb-3">
                        <label>Fakultas</label>
                        <select name="fakultas_id" class="select-form"id="fakultas">
                            <option value="" selected>...</option>
                            @foreach ($listFakultas as $item)
                                <option value="{{ $item->id }}"
                                    {{ $prodi->fakultas_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_fakultas ?? '-' }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="file" name="photo_kaprodi" id="" class="form-control" />
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
