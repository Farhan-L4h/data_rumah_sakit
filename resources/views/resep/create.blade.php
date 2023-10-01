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
                        <form action="{{ route('resep.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <!-- Tanggal -->
                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal :</label>
                                <input type="date" class="form-control @error('umur') is-invalid @enderror" name="tanggal" rows="5" value="" placeholder="Masukkan Tanggal">
                            
                                <!-- error message untuk content -->
                                @error('umur')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                             
                            <!-- nama pasien -->
                            <div class="col-md-6 mb-3 w-50">
                                <h5>Nama Pasien :</h5>
                                <select name="id_pasien" id="id_pasien" aria-label="Default select example " class="form-control">
                                    @foreach ($resepsis as $resepsi)
                                    <option value="{{ $resepsi->id }}">{{$resepsi->nama_pasien}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- nama dokter -->
                            <div class="col-md-6 mb-3 w-50">
                                <h5>Nama Dokter :</h5>
                                <select name="id_dokter" id="id_dokter" aria-label="Default select example" class="form-control">
                                    @foreach ($reseps as $resep)
                                    <option value="{{ $resep->id }}">{{$resep->nama_dokter}}</option>
                                    @endforeach
                                </select>
                            </div>

                             <!-- nama dokter -->
                             <div class="col-md-6 mb-3 w-50">
                                <h5>keluhan :</h5>
                                <select name="id_periksa" id="id_periksa" aria-label="Default select example" class="form-control">
                                    @foreach ($resepsionis as $resepsionis)
                                    <option value="{{ $resepsionis->id }}">{{$resepsionis->keluhan}}</option>
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
    CKEDITOR.replace( 'resep');
</script>
</body>
</html>