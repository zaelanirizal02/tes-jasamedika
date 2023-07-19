<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data kelurahan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
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
                        <a href="{{ route('kelurahans.create') }}" class="btn btn-md btn-success mb-3">TAMBAH kelurahan</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">KELURAHAN</th>
                                <th scope="col">KECAMATAN</th>
                                <th scope="col">KOTA</th>
                                <th scope="col" style="text-align: center">AKSI</th>

                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($kelurahans as $kelurahan)
                                <tr>

                                    <td>{{ $kelurahan->kelurahan }}</td>
                                    <td>{{ $kelurahan->kecamatan }}</td>
                                    <td>{{ $kelurahan->kota }}</td>

                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kelurahans.destroy', $kelurahan->id) }}" method="POST">
                                            <a href="{{ route('kelurahans.edit', $kelurahan->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data kelurahan belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>
                          {{ $kelurahans->links() }}
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
        @if(session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');

        @endif
    </script>

</body>
</html>
