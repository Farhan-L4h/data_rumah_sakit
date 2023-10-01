<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail antrian</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body ">
                        <div class="text-center">
                        <img src="{{ asset('storage/pasien/'.$antrians->pasien->image) }}" class="w-100 rounded  "></div>
                        <hr>

                        <h4> Deksripsi </h4> <br>
                        <p class="tmt-3 font-weight-bold" >
                        <b>Nama Pasien :</b> {{ $antrians->pasien->nama_pasien }} <br>
                        <b>Umur Pasien :</b> <b>{!! $antrians->pasien->umur !!}</b><br>    
                        <b>Jenis Kelamin :</b> <b>{!! $antrians->pasien->jenis_kelamin !!}</b><br>
                        <b>Alamat :</b> <b>{!! $antrians->pasien->alamat !!}</b><br>
                        <b>No Telepon :</b> <b>{!! $antrians->pasien->no_tpln !!}</b><br>
                        <b>Tanggal Lahir :</b> <b>{!! $antrians->pasien->tanggal_lahir !!}</b><br>

                            <p>-----------------------------------------------------------</p>
                            <b>Dokter Pembimbing :</b> <b>{{ $antrians->dokter->nama_dokter }} </b><br>
                            <b>Spesialis Dokter :</b> <b>{{ $antrians->dokter->bidang }} </b><br>
                            <b>Jenis Kelamin :</b> <b>{{ $antrians->dokter->jenis_kelamin }} </b><br>
                            <p>-----------------------------------------------------------</p>

                            <b>Nama Ruangan :</b> <b>{{ $antrians->ruangan->nama_ruangan }} </b><br>
                            <b>Nomer Resepsionis :</b> <b>{{ $antrians->resep->id }} </b><br>
                            <b>Tanggal Periksa :</b> <b>{{ $antrians->periksa->tanggal }} </b><br>
                            <b>Keluhan :</b> <b>{{ $antrians->periksa->keluhan }} </b><br>

                        
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>