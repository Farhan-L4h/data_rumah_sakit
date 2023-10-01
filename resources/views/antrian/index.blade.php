<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data antrian</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @include('layouts.app')
</head>
<body style="background: lightgray">

<h3 class="text-center my-4" style='color: Black;'> <b> Data Antrian Pasien</b></h3>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('antrian.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                              <th scope="col">Nomer Antrian</th>
                                <th scope="col">GAMBAR</th>
                                <th scope="col">Nama Pasien</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Keluhan</th>
                                <th scope="col">Nama Dokter</th>
                                <th scope="col">Nomer Resepsionis</th>
                                <th scope="col">Ruangan</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Tombol</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($antrians as $antrian)
                                <tr>
                                <td>{{ $antrian->id }}</td>
                                    <td class="text-center">
                                        <img href src="{{ asset('storage/pasien/' .$antrian->pasien->image) }}"  class="rounded" style="width: 150px">
                                    </td>
                                    <td>{{ $antrian->pasien->nama_pasien}}</td>
                                    <td>{{ $antrian->pasien->jenis_kelamin }}</td>
                                    <td>{{ $antrian->periksa->keluhan }}</td>
                                    <td>{{ $antrian->dokter->nama_dokter }}</td>
                                    <td>{{ $antrian->resep->id }}</td>
                                    <td>{{ $antrian->ruangan->nama_ruangan }}</td>
                                    <td>{{ $antrian->periksa->tanggal }}</td>

                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('antrian.destroy', $antrian->id) }}" method="POST">
                                            <!-- <a href="{{ route('antrian.edit', $antrian->id) }}" class="btn btn-sm btn-primary">EDIT</a> -->
                                            <a href="{{ route('antrian.show', $antrian->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Post belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $antrians->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>