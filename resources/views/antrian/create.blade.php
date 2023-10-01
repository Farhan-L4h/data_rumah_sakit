<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('antrian.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                             <!-- Tanggal -->
                             <div class="form-group">
                                <label class="font-weight-bold">Tanggal :</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" rows="5" value="" placeholder="Masukkan Tanggal">
                            
                                <!-- error message untuk content -->
                                @error('tanggal')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                             <!-- nama pasien -->
                             <div class="col-md-6 mb-3 w-50">
                                <h5>Nama Pasien :</h5>
                                <select name="id_pasien" id="id_pasien" aria-label="Default select example " class="form-control">
                                    @foreach ($antrians as $antrian)
                                    <option value="{{ $antrian->id }}">{{$antrian->nama_pasien}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="form-group">
                                <label class="font-weight-bold" for="jenis_kelamin">jenis_kelamin :</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" aria-label="Default select example" class="form-control">
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>

                                <!-- no periksa -->
                            <div class="col-md-6 mb-3 w-50">
                                <h5>Keluhan:</h5>
                                <select name="id_periksa" id="id_periksa" aria-label="Default select example" class="form-control">
                                    @foreach ($antrians3 as $antrian3)
                                    <option value="{{ $antrian3->id }}">{{$antrian3->keluhan}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- nama dokter -->
                            <div class="col-md-6 mb-3 w-50">
                                <h5>Nama Dokter :</h5>
                                <select name="id_dokter" id="id_dokter" aria-label="Default select example" class="form-control">
                                    @foreach ($antrians2 as $antrian2)
                                    <option value="{{ $antrian2->id }}">{{$antrian2->nama_dokter}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- nama ruangan -->
                            <div class="col-md-6 mb-3 w-50">
                                <h5>Nama Ruangan :</h5>
                                <select name="id_ruangan" id="id_ruangan" aria-label="Default select example" class="form-control">
                                    @foreach ($antrians5 as $antrian5)
                                    <option value="{{ $antrian5->id }}">{{$antrian5->nama_ruangan}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- nama resepsionis -->
                            <div class="col-md-6 mb-3 w-50">
                                <h5>No Resepsionis  :</h5>
                                <select name="id_resep" id="id_resep" aria-label="Default select example" class="form-control">
                                    @foreach ($antrians4 as $antrian4)
                                    <option value="{{ $antrian4->id }}">{{$antrian4->id}}</option>
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
    CKEDITOR.replace( 'antrian');
</script>
</body>
</html>