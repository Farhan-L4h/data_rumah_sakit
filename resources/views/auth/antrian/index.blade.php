<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @include('layouts.app')
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('data.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">GAMBAR</th>
                                <th scope="col">NAMA PASIEN</th>
                                <th scope="col">BIDANG</th>
                                <th scope="col">ALAMAT</th>
                                <th scope="col">UMUR</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">NO Telepon</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($datas as $data)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ Storage::url('public/datas/').$data->image }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td>{{ $data->nama_data }}</td>
                                    <td>{{ $data->umur }}</td>
                                    <td>{{ $data->jenis_kelamin }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>{{ $data->no_tlpn }}</td>
                                    <td>{{ $data->tgl_lahir }}</td>
                                    <td>{{ $data->nama_data }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('data.destroy', $data->id) }}" method="POST">
                                            <a href="{{ route('data.edit', $data->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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
                          {{ $datas->links() }}
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