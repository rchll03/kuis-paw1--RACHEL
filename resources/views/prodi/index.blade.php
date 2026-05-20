<!DOCTYPE html>
<html>
<head>
    <title>Data Prodi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-dark text-white d-flex justify-content-between">
            <h3>Data Prodi</h3>

            <a href="/prodi/create" class="btn btn-primary">
                Tambah Prodi
            </a>
        </div>

        <div class="card-body">

            @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

            @endif

            <table class="table table-bordered table-striped">

                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama Prodi</th>
                        <th>Nama Kaprodi</th>
                        <th>Alias Prodi</th>
                        <th width="200">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($prodi as $p)

                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->nama_prodi }}</td>
                        <td>{{ $p->nama_kaprodi }}</td>
                        <td>{{ $p->alias_prodi }}</td>

                        <td>

                            <a 
                                href="/prodi/{{ $p->id }}/edit"
                                class="btn btn-warning btn-sm"
                            >
                                Edit
                            </a>

                            <form 
                                action="/prodi/{{ $p->id }}"
                                method="POST"
                                style="display:inline;"
                            >

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm">
                                    Hapus
                                </button>

                            </form>

                        </td>
                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>
    </div>

</div>

</body>
</html>