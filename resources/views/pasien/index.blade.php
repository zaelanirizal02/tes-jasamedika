@extends('layouts.main')

@section('container')

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
    @endsection
