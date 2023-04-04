@extends('main')

@section('isi')

{{-- Modal Input Kegiatan --}}
<div class="modal fade" id="modal-form" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kegiatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">  
            <form class="user" action="tambah-event" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="nama_event" id="nama_event" class="form-control form-control-user" placeholder="Nama Kegiatan">
                    </div>
                    <div class="col-sm-6">
                        <input name="tgl_event" type="text" id="tgl_event" class="form-control form-control-user" onfocus="(this.type='date')" placeholder="Tanggal Kegiatan">
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="loc_event" name="loc_event" placeholder="Tempat Kegiatan">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="deskripsi" name="deskripsi" placeholder="Keterangan">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button href="submit" class="btn btn-primary ">Buat Kegiatan</button>
                </div>
            </form> 
        </div>
        </div>
    </div>
</div>

{{-- Content --}}
<div class="d-sm-flex align-items-center justify-content-between mb-4 ">
    <h1 class="h3 mr-lg-auto mb-0 text-gray-800">List Kegiatan</h1>
    <button data-target="#modal-form" data-toggle="modal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Kegiatan
    </button>
</div>
{{-- tabel  --}}
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
                        <th>Nama Kegiatan</th>
                        <th>Tanggal Kegiatan</th>
                        <th>Tempat Kegiatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal Kegiatan</th>
                        <th>Tempat Kegiatan</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    {{-- Data --}}
                    @foreach ($event as $item)
                    <tr>     
                        <td align="center" >{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_event }}</td>
                        <td>{{ $item->tgl_event }}</td>
                        <td>{{ $item->lokasi_event }}</td>
                        <td>
                            <form class="form-control-user mb-1" action="cetak/absen/{{ $item->id }}" method="POST">
                                @csrf   
                                <button class="btn btn-sm btn-primary"  type="submit">
                                <i class="fa fa-download" ></i> Download</button>
                            </form>
                            <form id="id_event" class="form-control-user mb-1" action="edit-absen-{{$item->id}}" method="POST">
                                @csrf
                                <button class="btn btn-sm btn-warning">
                                <i class="fa fa-edit" ></i> Edit</button>
                            </form>
                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusmodallabel{{$item->id }}">
                                {{-- <button class="btn btn-sm btn-danger" data-toggle="modal"data-target="#hapusmodallabel{{$item->id_pengurus}}"> --}}
                            <i class="fa fa-trash" ></i>  Hapus</button>
                        </td>
                    </tr>
                    {{-- End Data --}}
                    {{-- Modal Hapus --}}
                    
                    <div class="modal fade" id="hapusmodallabel{{$item->id }}" tabindex="-1" role="dialog" aria-labelledby="hapusmodallabelLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusmodallabel{{$item->id }}">Hapus Kegiatan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda Yakin Ingin Menghapus Data Ini?
                            </div>
                            <div class="modal-footer">
                                <form action="hapus/event/{{$item->id }}" method="POST">
                                    @csrf
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Hapus Data</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach 
                {{-- End Modal Hapus --}}
            </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function searchData() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("dataTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            }       
        }
    }
</script>


@endsection