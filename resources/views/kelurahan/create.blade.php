<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data kelurahan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('kelurahans.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf



                            <div class="form-group">
                                <label class="font-weight-bold">KELURAHAN</label>
                                <input type="text" class="form-control @error('kelurahan') is-invalid @enderror"
                                    name="kelurahan" value="{{ old('kelurahan') }}"
                                    placeholder="Masukkan Nama KELURAHAN">

                                <!-- error message untuk kelurahan -->
                                @error('kelurahan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">KECAMATAN</label>
                                <input type="text" class="form-control @error('kecamatan') is-invalid @enderror"
                                    name="kecamatan" value="{{ old('kecamatan') }}"
                                    placeholder="Masukkan Nama KECAMATAN">

                                <!-- error message untuk kecamatan -->
                                @error('kecamatan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">KOTA</label>
                                <input type="text" class="form-control @error('kota') is-invalid @enderror"
                                    name="kota" value="{{ old('kota') }}" placeholder="Masukkan Nama KOTA">

                                <!-- error message untuk kota -->
                                @error('kota')
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
