<!DOCTYPE html>
<html>
<head>
    <title>Data Fakultas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-dark text-white d-flex justify-content-between">
            <h3>Data Fakultas</h3>

            <a href="/fakultas/create" class="btn btn-primary">
                Tambah Fakultas
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
                        <th>Nama Fakultas</th>
                        <th>Nama Dekan</th>
                        <th width="200">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($fakultas as $f)

                    <tr>
                        <td>{{ $f->id }}</td>
                        <td>{{ $f->nama_fakultas }}</td>
                        <td>{{ $f->nama_dekan }}</td>

                        <td>

                            <a 
                                href="/fakultas/{{ $f->id }}/edit"
                                class="btn btn-warning btn-sm"
                            >
                                Edit
                            </a>

                            <form 
                                action="/fakultas/{{ $f->id }}"
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