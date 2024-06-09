<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover tablesm" style="border: 2px solid #ced4da;">
                <tr>
                    <th>NIK</th>
                    <td id="noNik"></td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td id="nama"></td>
                </tr>
                <tr>
                    <th>Pendapatan</th>
                    <td id="income"></td>
                </tr>
                <tr>
                    <th>Tanggungan</th>
                    <td id="outcome"></td>
                </tr>
                <tr>
                    <th>PBB</th>
                    <td id="pajak"></td>
                </tr>
                <tr>
                    <th>Tagihan Air</th>
                    <td id="air"></td>
                </tr>
                <tr>
                    <th>Tagihan Listrik</th>
                    <td id="listrik"></td>
                </tr>
            </table>
        </div>
    </div>
</div>

@push('js')
    <script>
        $(document).on('click', 'button.confirmation', function() {
            let id = $(this).data('id'); // Mengambil id_alternatif dari tombol yang diklik
            console.log(id)
            fetch('/dataBansos/show/' + id)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    $('#nama').html(data.penduduk.nama);
                    $('#noNik').html(data.penduduk.NIK);
                    // Pendapatan
                    let pendapatan = '';
                    if (data.pendapatan == 3) {
                        pendapatan = '&lt; Rp. 1,000,000,00';
                    } else if (data.pendapatan == 2) {
                        pendapatan = 'Rp. 1,000,000,00 - Rp. 3,000,000,00';
                    } else {
                        pendapatan = '&gt; Rp. 3,000,000,00';
                    }
                    $('#income').html(pendapatan);

                    // Tanggungan
                    let tanggungan = '';
                    if (data.tanggungan == 3) {
                        tanggungan = '&lt; 3 orang';
                    } else if (data.tanggungan == 2) {
                        tanggungan = '3 - 5 orang';
                    } else {
                        tanggungan = '&gt; 5 orang';
                    }
                    $('#outcome').html(tanggungan);

                    // PBB
                    let pbb = '';
                    if (data.pbb == 3) {
                        pbb = '&lt; Rp. 100,000,00';
                    } else if (data.pbb == 2) {
                        pbb = 'Rp. 100,000,00 - Rp. 300,000,00';
                    } else {
                        pbb = '&gt; Rp. 300,000,00';
                    }
                    $('#pajak').html(pbb);

                    // Tagihan Air
                    let air = '';
                    if (data.tagihanAir == 3) {
                        air = '&lt; Rp. 100,000,00';
                    } else if (data.tagihanAir == 2) {
                        air = 'Rp. 100,000,00 - Rp. 200,000,00';
                    } else {
                        air = '&gt; Rp. 200,000,00';
                    }
                    $('#air').html(air);

                    // Tagihan Listrik
                    let listrik = '';
                    if (data.tagihanListrik == 3) {
                        listrik = '&lt; Rp. 100,000,00';
                    } else if (data.tagihanListrik == 2) {
                        listrik = 'Rp. 100,000,00 - Rp. 200,000,00';
                    } else {
                        listrik = '&gt; Rp. 200,000,00';
                    }
                    $('#listrik').html(listrik);
                    // $('#alamat').html(data.Alamat);
                    // $('#statusnikah').html(data.status.status_nikah);
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });

        });
    </script>
@endpush
