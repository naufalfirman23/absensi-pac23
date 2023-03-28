<!DOCTYPE html>

<html>
<head>
<style type="text/css">
	@page {
        margin: 10mm 10mm 10mm 10mm;
         width: 210mm;
          height: 153mm;
    }
	@media print {
    	html {
          width: 210mm;
          height: 153mm;        
      }
    }
    body { font-size: 10pt }
  
	#table table { border-collapse: collapse; 
	font: normal 9px/150% Arial, Helvetica, sans-serif;} 
	#table table td, #table table th { padding: 1px 6px; }
	#table table th {
		color:#000000; font-size: 10px; font-weight: bold; border: 1px solid #000000; } 
	#table table td { color: #000000; border: 1px solid #000000;font-size: 9px;font-weight: normal; }
.alamat {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.univ {font-family: Arial, Helvetica, sans-serif; font-size: 18px; }
.fakultas {font-family: Arial, Helvetica, sans-serif; font-size: 16px; }
.label {font-family: Arial, Helvetica, sans-serif; font-size: 10px; }

</style>
</head>
<!-- onload="window.print()" -->
<body onload="window.print()"> 
    <table width="100%" style="border-collapse: collapse;">
	  <tr>
		<td align="center" valign="bottom"  style="border-bottom:1px solid #000000;">
            <img src="/img/logoaja1.png"  width="75%"></td>
            <td colspan="3" valign="bottom"  style="border-bottom:1px solid #000000;">
            <span class="univ"><strong>PIMPINAN ANAK CABANG IPNU-IPPNU</strong></span><br>
                        <span class="fakultas"><strong>NUSAWUNGU</strong></span><br>
            <span class="alamat">Sekretariat : Gedung MWCNU Jl.Perintis Kemerdekaan No.05 Nusawungu Kab. Cilacap
            <br> 
            Email : <a href="mailto:pacipnuippnunsw@gmail.com">pacipnuippnunsw@gmail.com </a> Homepage : <a href="http://pacipnuippnunsw.or.id">pacipnuippnunsw.or.id</a></span>
        </td>
	  </tr>
  <tr>
    <td width="10%"><span class="label">NAMA KEGIATAN</span></td>
    <td width="0%"><span class="label"><strong> :    @foreach ($data_absensis as $item => $data)
      @if ($item == '0')
        {{    strtoupper($data->nama_event) }}
      @endif
        
    @endforeach</strong></span></td>

    <td width="10%"><span class="label">LOKASI EVENT</span></td>
    <td width="0%"><span class="label"><strong> : @foreach ($data_absensis as $item => $data)
      @if ($item == '0')
        {{    strtoupper($data->lokasi_event) }}
      @endif
    @endforeach</strong> </span></td>
        
    </tr>
    <tr>

    <td width="0%"><span class="label">TANGGAL EVENT</span></td>
    <td width="0%"><span class="label"><strong> : @foreach ($data_absensis as $item => $data)
      @if ($item == '0')
        {{    strtoupper($data->tgl_event) }}
      @endif
        
    @endforeach</strong> </span></td>

    <td width="0%"><span class="label">KETERANGAN</span></td>
    <td width="0%"><span class="label"><strong> : @foreach ($data_absensis as $item => $data)
      @if ($item == '0')
        {{    strtoupper($data->deskripsi) }}
      @endif
        
    @endforeach</strong> </span></td>
  </tr>
</table>

<div id="table">
	<table width="100%" border="0">
	  <tr>
		<th>No.</th>
		<th>Nama Pengurus</th>
		<th>Waktu Absen</th>
		<th>Status</th>
	  </tr>
      <tbody>
        @foreach ($data_absensis as $absen)
            <tr>
                <td align="center" >{{ $loop->iteration }}</td>
                <td>{{ $absen->nama_pengurus }}</td>
                <td>{{ date('H:i',strtotime($absen->created_at)) }} WIB</td>
                <td>
                  @if ($absen->status == 'Hadir')
                  Hadir                      
                  @else
                  Tidak Diketahui
                  @endif
                </td>
            </tr>			    				
        @endforeach
      </tbody>
	</table>
</div>
</table>
</body>

</html>
