<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Dokter</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('dokter.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">GAMBAR</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" >
                            
                                <!-- error message untuk title -->
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Nama -->
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Dokter :</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" rows="5" value="" placeholder="Masukkan Nama Dokter">
                            
                                <!-- error message untuk content -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                             <!-- bidang -->
                             <div class="form-group">
                                <label class="font-weight-bold">Bidang :</label>
                                <select name="bidang" id="bidang" aria-label="Default select example" class="form-control" >
                                    <option value="Bedah">Spesialis Bedah</option>
                                    <option value="Gizi">Spesialis Gizi</option>
                                    <option value="Bedah">Spesialis Gigi</option>
                                    <option value="Gizi">Spesialis Tulang</option>
                                    <option value="Bedah">Spesialis Mata</option>
                                    <option value="Gizi">Spesialis Saraf</option>
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

                            <!-- Umur -->
                            <div class="form-group">
                                <label class="font-weight-bold">Umur :</label>
                                <input type="number" class="form-control @error('umur') is-invalid @enderror" name="umur" rows="5" value="" placeholder="Masukkan umur Dokter">
                            
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

                               


                            <!-- telepon -->
                            <div class="form-group">
                                <label class="font-weight-bold">No Telepon :</label>
                                <input type="number" class="form-control @error('tlp') is-invalid @enderror" name="no_tlpn" rows="5" value="" placeholder="Masukkan No Telepon Dokter">
                            
                                <!-- error message untuk content -->
                                @error('tlp')
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
    CKEDITOR.replace( 'pasien');
</script>
</body>
</html>