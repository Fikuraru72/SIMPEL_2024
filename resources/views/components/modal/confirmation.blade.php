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
                    $('#pendapatan').html(data.pendapatan);
                    $('#tanggungan').html(data.tanggungan);
                    $('#pbb').html(data.pbb);
                    $('#tagihanAir').html(data.tagihanAir);
                    $('#tagihanListrik').html(data.tagihanListrik);
                    $('button.confirmation-btn').attr('id', data.id_alternatif);
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
