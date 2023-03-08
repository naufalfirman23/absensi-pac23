@if ($user -> level == 1 )

<div class="sidebar-heading">
    Keanggotaan
</div>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Absensi</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Absensi :</h6>
            <a class="collapse-item" href="buat-code">Buat Code Absensi</a>
            <a class="collapse-item" href="rekap-absen">Rekap Absensi</a>
        </div>
    </div>
</li> 

@elseif ($user -> level == 2 )
<div class="sidebar-heading">
    Keanggotaan
</div>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Absensi</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Absensi :</h6>
            <a class="collapse-item" href="scan-code">Scan Absensi</a>
            <a class="collapse-item" href="cek-hadir">Lihat Kehadiran</a>
        </div>
    </div>
</li>

@endif
