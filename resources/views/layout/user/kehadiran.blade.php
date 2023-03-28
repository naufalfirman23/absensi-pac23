@extends('main')
@section('isi')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Rekap Absensi Kehadiran</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal Kegiatan</th>
                        <th>Lokasi Kegiatan</th>
                        <th>Status Kehadiran</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal Kegiatan</th>
                        <th>Lokasi Kegiatan</th>
                        <th>Status Kehadiran</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>Rutinan Selapanan</td>
                        <td>26 Januari 2023</td>
                        <td>Kedungbenda</td>
                        <td>Tidak Hadir</td>
                    </tr>
                    <tr>
                        <td>Rutinan Selapanan</td>
                        <td>26 Januari 2023</td>
                        <td>Kedungbenda</td>
                        <td>Tidak Hadir</td>
                    </tr>
                    <tr>
                        <td>Rutinan Selapanan</td>
                        <td>26 Januari 2023</td>
                        <td>Kedungbenda</td>
                        <td>Tidak Hadir</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection