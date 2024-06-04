<ul class="nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/penduduk/' . Auth::user()->id_penduduk) }}">
            <i class="mdi mdi-account menu-icon"></i>
            <span class="menu-title">Beranda</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/dataKeluarga/' . Auth::user()->id_penduduk) }}">
            <i class="mdi mdi-account-group menu-icon"></i>
            <span class="menu-title">Lihat Data Keluarga</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/bansos/' . Auth::user()->id_penduduk) }}">
            <i class="mdi mdi-cash-plus menu-icon"></i>
            <span class="menu-title">Pengajuan Bantuan Sosial</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/pengaduan') }}">
            <i class="mdi mdi-message-alert menu-icon"></i>
            <span class="menu-title">Pengaduan</span>
        </a>
    </li>
</ul>
