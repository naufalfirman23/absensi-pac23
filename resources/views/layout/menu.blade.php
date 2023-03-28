@php
    $user = Auth::user()
@endphp

@if ($user -> level == 1 )

<div class="sidebar-heading">
    Kegiatan
</div>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Event</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="master-absen">Master Event</a>
        </div>
    </div>
</li> 
<hr class="sidebar-divider d-none d-md-block">
{{-- Data Master --}}
<div class="sidebar-heading">
    Data Master
</div>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dataMaster"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Rekan-Rekanita</span>
    </a>
    <div id="dataMaster" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="data-pengurus">Data Pengurus</a>
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
            <a class="collapse-item" href="cek-hadir">Lihat Kehadiran</a>
        </div>
    </div>
</li>

@endif
