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
                        <form action="{{ route('ruangan.store') }}" method="POST" enctype="multipart/form-data">
                        
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
                                <label class="font-weight-bold">Nama Ruangan :</label>
                                <input type="text" class="form-control @error('nama_ruangan') is-invalid @enderror" name="nama" rows="5" value="" placeholder="Masukkan Nama Ruangan">
                            
                                <!-- error message untuk content -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Jenis Ruangan -->
                            <div class="form-group">
                                <label class="font-weight-bold" for="jenis">Jenis Kamar :</label>
                                <select name="jenis" id="jenis" aria-label="Default select example" class="form-control" >
                                    <option value="UGD">UGD</option>
                                    <option value="Operasi">Kamar Operasi</option>
                                    <option value="HCU">HCU</option>
                                    <option value="ICCU">ICCU</option>
                                </select>

                             <!-- Kapasitas -->
                             <div class="form-group">
                                <label class="font-weight-bold">Kapasitas :</label>
                                <input type="number" class="form-control @error('kapasitas') is-invalid @enderror" name="kapasitas" rows="5" value="" placeholder="Masukkan Kapasitas Kamar">
                            
                                <!-- error message untuk content -->
                                @error('kapasi')
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