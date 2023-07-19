<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data nama</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: rgb(219, 212, 253)">

    <div class="container mt-5 mb-5 " style="background: rgb(158, 147, 219)">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center my-4">REGISTRASI PASIEN</h3>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('pasiens.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf



                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama nama">

                                <!-- error message untuk nama -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Lahir</label>
                                <input type="text" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                    name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                                    placeholder="Masukkan Nama tanggal_lahir">

                                <!-- error message untuk tanggal_lahir -->
                                @error('tanggal_lahir')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Jenis_Kelamin : </label>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="jenis_kelamin" value="L" id="jenis_kelamin"
                                        required>Laki-Laki>
                                    <input type="radio" name="jenis_kelamin" value="P" id="jenis_kelamin"
                                        required>Perempuan>


                                    <!-- error message untuk jenis_kelamin -->
                                    @error('jenis_kelamin')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <label class="font-weight-bold">Alamat</label>
                                    <div class="input-group mb-3">

                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                            name="alamat" value="" placeholder="Masukkan Alamat">
                                    </div>
                                    <!-- error message untuk alamat -->
                                    @error('alamat')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="input-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">RT</span>
                                        <input type="text" class="form-control @error('rt') is-invalid @enderror"
                                            name="rt" value="" placeholder="RT">
                                        <span class="input-group-text">RW</span>
                                        <input type="text" class="form-control @error('rw') is-invalid @enderror"
                                            name="rw" value="" placeholder="RW">

                                        <select name="kelurahan" class="form-control">
                                            <option value="kelurahan">Kelurahan -</option>
                                            @foreach ($kelurahans as $item)
                                                <option value="{{ $item->kelurahan }}">{{ $item->kelurahan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- error message untuk alamat -->
                                    @error('alamat')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="input-group">

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">No Telepon</label>
                                <input type="text" class="form-control @error('no_telepon') is-invalid @enderror"
                                    name="no_telepon" value="{{ old('no_telepon') }}"
                                    placeholder="Masukkan No Telepon">

                                <!-- error message untuk jenis_kelamin -->
                                @error('no_telepon')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('');
    </script>
</body>

</html>
