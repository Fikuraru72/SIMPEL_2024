
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin') }}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ url('/datapenduduk') }}" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">Data Penduduk</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#bantuan" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-cash menu-icon"></i>
          <span class="menu-title">Bantuan Sosial</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="bantuan">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{url('/verifikasiBansos')}}"> Verifikasi </a></li>
              <li class="nav-item"> <a class="nav-link" href="{{url('/dataBansos')}}"> Data Bantuan Sosial </a></li>
            </ul>
          </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ url('/laporan') }}" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-message-bulleted menu-icon"></i>
          <span class="menu-title">Laporan Masyarakat</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#history" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-history menu-icon"></i>
          <span class="menu-title">Riwayat</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="history">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('/riwayatPenduduk') }}"> Data Penduduk </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> Bantuan Sosial </a></li>
          </ul>
        </div>
      </li>


    </ul>

