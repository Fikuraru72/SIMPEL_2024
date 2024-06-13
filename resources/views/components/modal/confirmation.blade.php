<div class="modal" id="modal-confirmation" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(8, 116, 211); color: white;">
                <h4 class="modal-title">Konfirmasi Pengajuan</h4>
            </div>
            <table class="table table-bordered table-striped table-hover tablesm" style="border: 2px solid #ced4da;">
                <tr>
                    <th>Nama Kepala Keluarga</th>
                    <td id="nama"></td>
                </tr>
                <tr>
                    <th>No.KK</th>
                    <td id="NoKK"></td>
                </tr>
                <tr>
                    <th>Pendapatan</th>
                    <td id="pendapatan"></td>
                </tr>
                <tr>
                    <th>Tanggungan</th>
                    <td id="tanggungan"></td>
                </tr>
                <tr>
                    <th>PBB</th>
                    <td id="pbb"></td>
                </tr>
                <tr>
                    <th>Tagihan Air</th>
                    <td id="tagihanAir"></td>
                </tr>
                <tr>
                    <th>Tagihan Listrik</th>
                    <td id="tagihanListrik"></td>
                </tr>

            </table>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success confirmation-btn">Konfirmasi</button>
            </div>

        </div>
    </div>
</div>

@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        $(document).on('click', 'button.confirmation', function() {
            let id = $(this).data('id'); // Mengambil id_alternatif dari tombol yang diklik
            console.log(id)
            fetch('verifikasiBansos/details/' + id)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {

                    $('#nama').html(data.penduduk.nama);
                    $('#NoKK').html(data.penduduk.NoKK);
                    let pendapatan = '';
                    if (data.pendapatan == 3) {
                        pendapatan = '&lt; Rp. 1,000,000,00';
                    } else if (data.pendapatan == 2) {
                        pendapatan = 'Rp. 1,000,000,00 - Rp. 3,000,000,00';
                    } else {
                        pendapatan = '&gt; Rp. 3,000,000,00';
                    }
                    $('#pendapatan').html(pendapatan);

                    // Tanggungan
                    let tanggungan = '';
                    if (data.tanggungan == 3) {
                        tanggungan = '&lt; 3 orang';
                    } else if (data.tanggungan == 2) {
                        tanggungan = '3 - 5 orang';
                    } else {
                        tanggungan = '&gt; 5 orang';
                    }
                    $('#tanggungan').html(tanggungan);

                    // PBB
                    let pbb = '';
                    if (data.pbb == 3) {
                        pbb = '&lt; Rp. 100,000,00';
                    } else if (data.pbb == 2) {
                        pbb = 'Rp. 100,000,00 - Rp. 300,000,00';
                    } else {
                        pbb = '&gt; Rp. 300,000,00';
                    }
                    $('#pbb').html(pbb);

                    // Tagihan Air
                    let tagihanAir = '';
                    if (data.tagihanAir == 3) {
                        tagihanAir = '&lt; Rp. 100,000,00';
                    } else if (data.tagihanAir == 2) {
                        tagihanAir = 'Rp. 100,000,00 - Rp. 200,000,00';
                    } else {
                        tagihanAir = '&gt; Rp. 200,000,00';
                    }
                    $('#tagihanAir').html(tagihanAir);

                    // Tagihan Listrik
                    let tagihanListrik = '';
                    if (data.tagihanListrik == 3) {
                        tagihanListrik = '&lt; Rp. 100,000,00';
                    } else if (data.tagihanListrik == 2) {
                        tagihanListrik = 'Rp. 100,000,00 - Rp. 200,000,00';
                    } else {
                        tagihanListrik = '&gt; Rp. 200,000,00';
                    }
                    $('#tagihanListrik').html(tagihanListrik);

                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });

        });
    </script>

    <script>
        document.addEventListener('click', function(event) {
            if (event.target.matches('.confirmation-btn')) {
                let id = event.target.getAttribute('id');
                fetch('verifikasiBansos/konfirmasi/' + id, {
                        method: 'PUT', // Gunakan PUT karena kita melakukan update
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Tampilkan pesan sukses atau lakukan aksi yang diperlukan
                        console.log(data.message);
                        location.reload();
                    })
                    .catch(error => {
                        // Tampilkan pesan error atau lakukan aksi yang diperlukan
                        console.error('There was a problem with the fetch operation:', error);
                    });
            }
        });
    </script>
@endpush
