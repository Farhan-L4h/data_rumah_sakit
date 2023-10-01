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
                        <form action="{{ route('antrian.update', $antrians->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')  

                            <div class="form-group">
                                <label class="font-weight-bold">Nomer antrian</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('id', $antrians->id) }}" placeholder="Edit Nomer Antrian">
                            
                                <!-- error message untuk title -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal :</label>
                                <input type="date" class="form-control @error('lahir') is-invalid @enderror" name="tanggal" value="{{ old('tanggal', $antrians->tanggal) }}" placeholder="Edit Tanggal">
                            
                                <!-- error message untuk title -->
                                @error('lahir')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Umur</label>
                                <input type="text" class="form-control @error('umur') is-invalid @enderror" name="umur" value="{{ old('umur', $antrians->umur) }}" placeholder="Edit Umur">
                            
                                <!-- error message untuk title -->
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

                                <div class="form-group">
                                <label class="font-weight-bold">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat', $antrians->alamat) }}" placeholder="Edit Alamat">
                            
                                <!-- error message untuk title -->
                                @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">No Telepon</label>
                                <input type="number" class="form-control @error('tlpn') is-invalid @enderror" name="no_tlpn" value="{{ old('no_tlpn', $antrians->no_tlpn) }}" placeholder="Edit No Telepon">
                            
                                <!-- error message untuk title -->
                                @error('tlpn')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- dokter -->
                            <div class="form-group">
                                <label class="font-weight-bold">Dokter :</label>
                                <select name="id_dokter" id="id_dokter" aria-label="Default select example" class="form-control" >
                                    <option value="">Select</option>
                                    <option value="Bedah">Spesialis Bedah</option>
                                    <option value="Gizi">Spesialis Gizi</option>
                                    <option value="Bedah">Spesialis Gigi</option>
                                    <option value="Gizi">Spesialis Tulang</option>
                                    <option value="Bedah">Spesialis Mata</option>
                                    <option value="Gizi">Spesialis Saraf</option>
                                </select>

                            

                            

                           

                            

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