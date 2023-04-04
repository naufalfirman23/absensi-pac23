@extends('main')


@section('isi')
<div class="d-sm-flex align-items-center justify-content-between mb-4 ">
    @foreach ($data_event as $event)
        <h4>{{$event->nama_event}}</h4>
        <form action="scan-ulang-{{$event->id}}" method="GET">
            @csrf
            <form action="scan-ulang-{{$event->id}}" method="POST">
                @csrf
                <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-camera fa-sm text-white-50"></i> Scan Absen
                </button>
            </form>
        </form>
    @endforeach
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
            <form class="d-none d-sm-inline-block form-inline mr-auto md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                <input type="text" id="searchInput" onkeyup="searchData()" class="form-control bg-light  small" placeholder="Cari data..."
                    aria-label="Search" aria-describedby="basic-addon2">
                
            </div>
        </form>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Departemen</th>
                        <th>Status</th>
                        <th>Control Data</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Departemen</th>
                        <th>Status</th>
                        <th>Control Data</th>
                    </tr>
                </tfoot>
                <tbody>
                    {{-- Data --}}
                    @foreach ($data_absen as $item)         
                    <tr>
                        <td align="center" >{{ $loop->iteration }}</td>
                        <td>{{ $item->pengurus->nama_pengurus }}</td>
                        <td>{{ $item->pengurus->departemen->nama_dept }}</td>
                        <td>{{ $item->status}}</td>
                            <td>
                                <button class="btn btn-circle btn-danger" data-toggle="modal"data-target="#hapusmodallabel{{$item->id}}">
                                <i class="fa fa-times" ></i></button>
                            </td>
                        </tr>
                        {{-- End Data --}}
                    {{-- Modal Hapus  --}}
                    <div class="modal fade" id="hapusmodallabel{{$item->id }}" tabindex="-1" role="dialog" aria-labelledby="hapusmodallabelLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusmodallabel{{$item->id }}">Hapus Absen</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda Yakin Akan Menghapus Absen ini?
                                </div>
                            <div class="modal-footer">
                                <form action="hapus/absen/{{$item->id }}" method="POST" onsubmit="submitForm(event)">
                                    @csrf
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Hapus Data</button>

                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function submitForm(event) {
      event.preventDefault(); // Menghentikan aksi default dari form
    
      var form = event.target;
      var formData = new FormData(form);
    
      // Kirim data form menggunakan metode fetch()
      fetch(form.action, {
        method: form.method,
        body: formData
      }).then(function(response) {
        // Auto load halaman setelah submit berhasil
        location.reload();
      });
    }
    </script>

@endsection