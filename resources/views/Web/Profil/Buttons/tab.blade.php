<div class="nav-tabs">
    <div class="nav-tab active-nav" id="dashboard-tab" role="button" onclick="changeTab('dashboard')">
        <span class="nav-link "><i class="icofont-home"></i> Dashboard</span>
    </div>
    <div class="nav-tab" id="Partisipasi-tab" role="button" onclick="changeTab('Partisipasi')">
        <span class="nav-link"><i class="icofont-under-construction-alt"></i> Riwayat Partisipasi</span>
    </div>
     @if (Auth::user()->role == 'penyelenggara')
     <div class="nav-tab" id="pengajuan-tab" role="button" onclick="changeTab('pengajuan')">
         <span class="nav-link"><i class="icofont-data"></i>Kelola Event</span>
     </div>
     @endif
    @if (Auth::user()->role == 'pengguna')
    <div class="nav-tab" id="peran-tab" role="button" onclick="changeTab('peran')">
        <span class="nav-link"><i class="icofont-contact-add"></i> Ambil Peran</span>
    </div>
    @endif
    <div class="nav-tab" id="pengaturan-tab" role="button" onclick="changeTab('pengaturan')">
        <span class="nav-link"><i class="icofont-gears"></i> Pengaturan akun</span>
    </div>
    <div class="nav-tab" id="keluar-tab" role="button" data-toggle="modal" data-target="#exampleModal">
        <span class="nav-link"><i class="icofont-sign-out"></i> Keluar</span>
    </div>
</div>
