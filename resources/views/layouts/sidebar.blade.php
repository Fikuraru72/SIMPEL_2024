<ul class="nav">
    <li class="nav-item">
        @if (Auth::user()->level == 'penduduk')
            <a class="nav-link" href="{{ url('/penduduk') }}">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">Beranda</span>
            </a>
        @else
            <a class="nav-link" href="{{ url('/admin') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        @endif
    </li>

    <li class="nav-item">
        @if (Auth::user()->level == 'penduduk')
            <a class="nav-link" href="{{ url('/dataKeluarga') }}">
                <i class="mdi mdi-account-group menu-icon"></i>
                <span class="menu-title">Lihat Data Keluarga</span>
            </a>
        @else
            <a class="nav-link" href="{{ url('/datapenduduk') }}" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">Data Penduduk</span>
            </a>
        @endif
    </li>

    <li class="nav-item">
        @if (Auth::user()->level == 'penduduk')
            <a class="nav-link" href="{{ url('/bansos') }}">
                <i class="mdi mdi-cash-plus menu-icon"></i>
                <span class="menu-title">Pengajuan Bantuan Sosial</span>
            </a>
        @else
            <a class="nav-link" data-bs-toggle="collapse" href="#bantuan" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-cash menu-icon"></i>
                <span class="menu-title">Bantuan Sosial</span>
                <i class="menu-arrow"></i>
            </a>
        @endif

        <div class="collapse" id="bantuan">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/verifikasiBansos') }}"> Verifikasi </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/dataBansos') }}"> Data Bantuan Sosial </a>
                    </li>
                    @if (Auth::user()->level == 'admin')
                        <li class="nav-item"> <a class="nav-link" href="{{ url('/perhitunganBansosMabac') }}">
                                Perhitungan
                                Mabac
                            </a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ url('/perhitunganBansosMoora') }}">
                                Perhitungan
                                Moora
                            </a></li>
                    @endif
                </ul>

        </div>
    </li>

    <li class="nav-item">
            @if (Auth::user()->level == 'penduduk')
            <a class="nav-link" href="{{ url('/pengaduan') }}">
                <i class="mdi mdi-message-alert menu-icon"></i>
                <span class="menu-title">Pengaduan</span>
            </a>
            @else
            <a class="nav-link" href="{{ url('/laporan') }}" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-message-bulleted menu-icon"></i>
                <span class="menu-title">Laporan Masyarakat</span>
            </a>
            @endif
     </li>

     @if (Auth::user()->level !== 'penduduk')
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#history" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-history menu-icon"></i>
                <span class="menu-title">Riwayat</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="history">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/riwayatPenduduk') }}"> Data Penduduk </a>
                    </li>
                </ul>
            </div>
        </li>
     @endif

</ul>
