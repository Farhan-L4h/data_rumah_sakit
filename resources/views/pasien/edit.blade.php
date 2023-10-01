<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data LIST </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('pasien.update', $pasiens->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">GAMBAR</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Pasien</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama_pasien', $pasiens->nama_pasien) }}" placeholder="Edit Nama pasien">
                            
                                <!-- error message untuk title -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Umur</label>
                                <input type="text" class="form-control @error('umur') is-invalid @enderror" name="umur" value="{{ old('umur', $pasiens->umur) }}" placeholder="Edit Umur">
                            
                                <!-- error message untuk title -->
                                @error('umur')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3 w-50">
                                <h5>Nama Dokter :</h5>
                                <select name="id_dokter" id="id_dokter" aria-label="Default select example" class="form-control">
                                    <option value="{{ old('nama_dokter', $pasiens->dokter->nama_dokter) }}">{{ old('nama_dokter', $pasiens->dokter->nama_dokter) }}</option>
                                </select>
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="form-group">
                                <label class="font-weight-bold" for="je nis_kelamin">Jenis Kelamin :</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" aria-label="Default select example" class="form-control">
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>

                                <div class="form-group">
                                <label class="font-weight-bold">Alamat :</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat', $pasiens->alamat) }}" placeholder="Edit Alamat">
                            
                                <!-- error message untuk title -->
                                @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">NO Telepon :</label>
                                <input type="number" class="form-control @error('alamat') is-invalid @enderror" name="no_tlpn" value="{{ old('no_tlpn', $pasiens->no_tlpn) }}" placeholder="Edit no telepon">
                            
                                <!-- error message untuk title -->
                                @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                                <div class="form-group">
                                <label class="font-weight-bold">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('alamat') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pasiens->tanggal_lahir) }}" placeholder="Edit tanggal lahir">
                            
                                <!-- error message untuk title -->
                                @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
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
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>