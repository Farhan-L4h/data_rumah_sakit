<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data List ANIMEK</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('pasien.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">GAMBAR</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            
                                <!-- error message untuk title -->
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Nama -->
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Pasien :</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" rows="5" value="" placeholder="Masukkan Nama Pasien">
                            
                                <!-- error message untuk content -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                             <!-- Umur -->
                             <div class="form-group">
                                <label class="font-weight-bold">Umur Pasien :</label>
                                <input type="number" class="form-control @error('umur') is-invalid @enderror" name="umur" rows="5" value="" placeholder="Masukkan umur Pasien">
                            
                                <!-- error message untuk content -->
                                @error('umur')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                             <!-- Jenis Kelamin -->
                             <div class="form-group">
                                <label class="font-weight-bold" for="jenis_kelamin">Jenis Kelamin :</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" aria-label="Default select example" class="form-control">
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>

                                <!-- Alamat -->
                             <div class="form-group">
                                <label class="font-weight-bold">Alamat :</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="5" value="" placeholder="Masukkan Alamat Pasien">
                            
                                <!-- error message untuk content -->
                                @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <!-- telepon -->
                            <div class="form-group">
                                <label class="font-weight-bold">No Telepon :</label>
                                <input type="number" class="form-control @error('tlp') is-invalid @enderror" name="no_tlpn" rows="5" value="" placeholder="Masukkan No Pasien Pasien">
                            
                                <!-- error message untuk content -->
                                @error('tlp')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- tgl lahir -->
                            <div class="form-group">
                                <label class="font-weight-bold">Tgl Lahir :</label>
                                <input type="date" class="form-control @error('lahir') is-invalid @enderror" name="tanggal_lahir" rows="5" value="" placeholder="Masukkan Tanggal lahir Pasien">
                            
                                <!-- error message untuk content -->
                                @error('lahir')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- nama dokter -->
                            <div class="col-md-6 mb-3 w-50">
                                <h5>Nama Dokter :</h5>
                                <select name="id_dokter" id="id_dokter" aria-label="Default select example" class="form-control">
                                    @foreach ($pasiens as $pasien)
                                    <option value="{{ $pasien->id }}">{{$pasien->nama_dokter}}</option>
                                    @endforeach
                                </select>
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
    CKEDITOR.replace( 'pasien');
</script>
</body>
</html>