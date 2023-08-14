@extends('layouts.main')

@section('container')

    <body style="background: lightgray">

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <h3 class="text-center my-4">DATA KELURAHAN</h3>


                        <hr>
                    </div>
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <a href="{{ route('kelurahans.create') }}" class="btn btn-md btn-success mb-3">TAMBAH
                                kelurahan</a>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">NO</th>
                                        <th scope="col">KELURAHAN</th>
                                        <th scope="col">KECAMATAN</th>
                                        <th scope="col">KOTA</th>
                                        <th scope="col" style="text-align: center">AKSI</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($kelurahans as $kelurahan)
                                        <tr>

                                            <td>{{ $i }}</td>
                                            <td>{{ $kelurahan->kelurahan }}</td>
                                            <td>{{ $kelurahan->kecamatan }}</td>
                                            <td>{{ $kelurahan->kota }}</td>

                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('kelurahans.destroy', $kelurahan->id) }}"
                                                    method="POST">
                                                    <a href="{{ route('kelurahans.edit', $kelurahan->id) }}"
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
                            {{ $kelurahans->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
