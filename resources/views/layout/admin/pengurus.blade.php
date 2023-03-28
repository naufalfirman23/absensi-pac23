
@extends('main')

@section('isi')

{{-- Modal Input --}}
<div class="modal fade" id="modal-form" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Input Data Pengurus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form class="user" action="input/data" method="post">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6  mb-sm-0">
                        <input type="text" class="form-control " placeholder="Nama Pengurus" name="nama">
                    </div>
                    <div class="col-sm-6">
                        <select class=" form-control" id="departemen"  name="departemen">
                            <option selected hidden>Departemen</option>
                            @foreach($departemen as $dept)
                            <option value="{{ $dept->id }}">{{ $dept->nama_dept }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <select class=" form-control" name="jabatan" id="jabatan">
                          <option selected hidden>Jabatan</option>
                          @foreach($jabatan as $jbtn)
                          <option value="{{ $jbtn->id }}">{{ $jbtn->nama_jabatan }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <select class=" form-control" name="ranting" id="ranting">
                          <option selected hidden>Ranting</option>
                          @foreach($ranting as $input_ranting)
                          <option value="{{ $input_ranting->id }}">{{ $input_ranting->nama_ranting }}</option>
                          @endforeach
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form> 
        </div>
        </div>
    </div>
</div>

{{-- Content --}}
<div class="d-sm-flex align-items-center justify-content-between mb-4 ">
    <h1 class="h3 mr-lg-auto mb-0 text-gray-800">Data Pengurus</h1>
    <button data-target="#modal-form" data-toggle="modal" class="d-none d-sm-inline-block btn btn-sm mr-xl-2 btn-blue shadow-sm ">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
    </button>
    <button onClick="window.open('cetak-data');" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i> Download Data
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
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Departemen</th>
                        <th>Asal Ranting</th>
                        <th>Control Data</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Departemen</th>
                        <th>Asal Ranting</th>
                        <th>Control Data</th>
                    </tr>
                </tfoot>
                <tbody>
                    {{-- Data --}}
                    <tr>
                        @foreach ($data as $item)         
                        <td>{{ ucfirst($item ->nama_pengurus) }}</td>
                        <td>{{ ucfirst($item ->jabatan->nama_jabatan) }}</td>
                        <td>{{ ucfirst($item ->departemen->nama_dept) }}</td>
                        <td>{{ ucfirst($item ->ranting->nama_ranting) }}</td>
                            <td>
                                <button class="btn btn-circle btn-danger" data-toggle="modal"data-target="#hapusmodallabel{{$item->id_pengurus}}">
                                <i class="fa fa-trash" ></i></button>
                                <button class="btn btn-circle btn-warning" data-toggle="modal"data-target="#updatemodallabel{{$item->id_pengurus}}">
                                <i class="fa fa-edit" ></i></button>
                            </td>
                    </tr>
                    {{-- End Data --}}
                    {{-- Modal Edit --}}
                    <div class="modal fade" id="updatemodallabel{{$item->id_pengurus}}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Data Pengurus</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                                <form class="user" action="update/data/{{$item->id_pengurus}}" method="post">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-6  mb-sm-0">
                                            <input type="text" class="form-control " placeholder="{{ ucfirst($item ->nama_pengurus) }}" id="edit_nama" name="edit_nama">
                                        </div>
                                        <div class="col-sm-6">
                                            <select class=" form-control" id="edit_departemen"  name="edit_departemen">
                                                <option selected hidden>{{ ucfirst($item ->departemen->nama_dept) }}</option>
                                                @foreach($departemen as $dept)
                                                <option value="{{ $dept->id }}">{{ $dept->nama_dept }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 ">
                                            <select class=" form-control" name="edit_jabatan" id="edit_jabatan">
                                              <option selected hidden>{{ ucfirst($item ->jabatan->nama_jabatan) }}</option>
                                              @foreach($jabatan as $jbt)
                                              <option value="{{ $jbt->id }}">{{ $jbt->nama_jabatan }}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6 ">
                                            <select class=" form-control" name="edit_ranting" id="edit_ranting">
                                              <option selected hidden>{{ ucfirst($item ->ranting->nama_ranting) }}</option>
                                              @foreach($ranting as $rtg)    
                                              <option value="{{ $rtg->id }}">{{ $rtg->nama_ranting }}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form> 
                            </div>
                            </div>
                        </div>
                    </div>
                    {{-- Modal Hapus --}}

                    <div class="modal fade" id="hapusmodallabel{{$item->id_pengurus}}" tabindex="-1" role="dialog" aria-labelledby="hapusmodallabelLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusmodallabelLabel">Hapus Data Pengurus</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda Yakin Ingin Menghapus Data Ini?
                            </div>
                            <div class="modal-footer">
                                <form action="hapus/data/{{$item->id_pengurus}}" method="post">
                                    @csrf
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Hapus Data</button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                    {{-- End Modal Hapus --}}
    
                    @endforeach
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