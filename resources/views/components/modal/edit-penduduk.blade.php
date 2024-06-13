<div class="card-body">
    <!-- Form Edit -->
    <form id="form-edit" method="POST">
        @csrf
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="NIK">NIK</label>
            <input type="text" class="form-control" id="NIK" name="NIK" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama1" name="nama" required>
        </div>
        <div class="form-group">
            <label for="NoKK">No KK</label>
            <input type="text" class="form-control" id="NoKK1" name="NoKK" required>
        </div>
        <div class="form-group">
            <label for="TTL">TTL</label>
            <input type="date" class="form-control" id="TTL" name="TTL" required>
        </div>
        <div class="form-group">
            <label for="Agama">Agama</label>
            <select class="form-select" id="Agama" name="Agama">
                <option>Islam</option>
                <option>Katolik</option>
                <option>Protestan</option>
                <option>Hindu</option>
                <option>Budha</option>
                <option>Khonghuchu</option>
            </select>
        </div>
        <div class="form-group">
            <label for="JenisKelamin">Jenis Kelamin</label>
            <select class="form-select" id="JenisKelamin" name="JenisKelamin">
                <option>Pria</option>
                <option>Wanita</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status_nikah">Status Nikah</label>
            {{-- <input type="text" class="form-control"  required> --}}
            <select class="form-select" id="status_nikah" name="status_nikah">
                <option>Belum Kawin</option>
                <option>Kawin</option>
                <option>Cerai Hidup</option>
                <option>Cerai Mati</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status_warga">Status Warga</label>
            <select class="form-select" id="status_warga" name="status_warga">
                <option>Tinggal</option>
                <option>Meninggal</option>
                <option>Pindah</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status_keluarga">Status keluarga</label>
            <select class="form-select" id="status_keluarga" name="status_keluarga">
                <option>Kepala Keluarga</option>
                <option>Anggota Keluarga</option>
            </select>
        </div>
        <div class="form-group">
            <label for="rt">RT</label>
            <select class="form-select" id="rtw" name="rt">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
            </select>
        </div>
        <div class="form-group">
            <label for="Alamat">Alamat</label>
            <input type="text" class="form-control" id="Alamat" name="Alamat" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

@push('js')
    <script>
        $(document).on('click', 'button.edit', function() {
            let id = $(this).data('id'); // Mengambil id_alternatif dari tombol yang diklik
            // console.log(id)
            fetch('{{ url('') }}/datapenduduk/edit/' + id)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data);
                    document.getElementById('NIK').value = data.NIK;
                    document.getElementById('nama1').value = data.nama;
                    document.getElementById('NoKK1').value = data.NoKK;
                    document.getElementById('TTL').value = data.TTL;
                    document.getElementById('Agama').value = data.Agama;
                    document.getElementById('JenisKelamin').value = data.JenisKelamin;
                    document.getElementById('rtw').value = data.rt;
                    document.getElementById('Alamat').value = data.Alamat;
                    document.getElementById('status_keluarga').value = data.status.status_keluarga;
                    document.getElementById('status_warga').value = data.status.status_warga;
                    document.getElementById('status_nikah').value = data.status.status_nikah;

                    document.getElementById('form-edit').action =
                        `{{ route('datapenduduk.update', ['id' => ':id']) }}`
                        .replace(':id', data.id_penduduk);
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });

        });
    </script>
@endpush
