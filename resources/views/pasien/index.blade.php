<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data pasien</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<nav class=" navbar-expand-sm bg-primary navbar-light" style="font-size: 20px">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
        <div class="container-fluid justify-content-center">
            <a class="navbar-link active" href="/kelurahans" style="color: aliceblue">Data Kelurahan</a>
            <span>--</span>
            <a class="navbar-link active" href="/pasiens" style="color: aliceblue">Data Pasien</a>
        </div>
    </nav>
</nav>

<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">DATA PASIEN</h3>




                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('pasiens.create') }}" class="btn btn-md btn-success mb-3">REGISTRASI
                            PASIEN</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-1">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">No Telepon</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Pasien ID</th>
                                    <th scope="col" style="text-align: center">AKSI</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($pasiens as $pasien)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $pasien->nama }}</td>
                                        <td>{{ $pasien->tanggal_lahir }}</td>
                                        <td>{{ $pasien->jenis_kelamin }}</td>
                                        <td>{{ $pasien->no_telepon }}</td>
                                        <td>{{ $pasien->alamat }}, RT/{{ $pasien->rt }}, RW/{{ $pasien->rw }},
                                            <br> Kelurahan
                                            {{ $pasien->kelurahan }}
                                        </td>
                                        <td>{{ $pasien->pasien_id }}</td>

                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('pasiens.destroy', $pasien->id) }}" method="POST">
                                                <a href="{{ route('pasiens.edit', $pasien->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $pasiens->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>

</body>

</html>
