<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover tablesm" style="border: 2px solid #ced4da;">
                <tr>
                    <th>Nama</th>
                    <td id="nama"></td>
                </tr>
                <tr>
                    <th>NIK</th>
                    <td id="nik"></td>
                </tr>
                <tr>
                    <th>No.KK</th>
                    <td id="NoKK"></td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td id="tanggal"></td>
                </tr>
                <tr>
                    <th>Agama</th>
                    <td id="agama"></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td id="gender"></td>
                </tr>
                <tr>
                    <th>RT</th>
                    <td id="rt"></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td id="alamat"></td>
                </tr>
            </table>
        </div>
    </div>
</div>

@push('js')
    <script>
        $(document).on('click', 'button.detail', function() {
            let id = $(this).data('id'); // Mengambil id_alternatif dari tombol yang diklik
            // console.log(id)
            fetch('/datapenduduk/show/' + id)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    $('#nama').html(data.nama);
                    $('#nik').html(data.NIK);
                    $('#NoKK').html(data.NoKK);
                    $('#tanggal').html(data.TTL);
                    $('#agama').html(data.Agama);
                    $('#gender').html(data.JenisKelamin);
                    $('#rt').html(data.rt);
                    $('#alamat').html(data.Alamat);
                    // $('#statusnikah').html(data.status.status_nikah);
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });

        });
    </script>
@endpush
