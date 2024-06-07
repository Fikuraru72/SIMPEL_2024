<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Menambah Data Penduduk Baru</h4>
            <form method="post" action="{{ route('dataBansos.store') }}" id="formPengaduan">
                @csrf
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" placeholder="nik" name="nik">
                </div>
                <div class="form-group">
                    <label for="nik">NO.KK</label>
                    <input type="text" class="form-control" id="nokk" placeholder="No.KK" name="nokk">
                </div>
                <div class="form-group">
                    <label for="pendapatan">Pendapatan</label>
                    <select class="form-control" id="pendapatan" name="pendapatan">
                        <option value="" disabled selected>Pilih Pendapatan</option>
                        <option value="3">&lt; Rp. 1,000,000,00</option>
                        <option value="2">Rp. 1,000,000,00 - Rp. 3,000,000,00</option>
                        <option value="1">&gt; Rp. 3,000,000,00</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggungan">Tanggungan yang Belum Bekerja</label>
                    <select class="form-control" id="tanggungan" name="tanggungan">
                        <option value="" disabled selected>Pilih Tanggungan</option>
                        <option value="3">&lt; 3 orang</option>
                        <option value="2">3 - 5 orang</option>
                        <option value="1">&gt; 5 orang</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pbb">Pajak Bumi dan Bangunan</label>
                    <select class="form-control" id="pbb" name="pbb">
                        <option value="" disabled selected>Pilih Pajak</option>
                        <option value="3">&lt; Rp. 100,000,00</option>
                        <option value="2">Rp. 100,000,00 - Rp. 300,000,00</option>
                        <option value="1">&gt; Rp. 300,000,00</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tagAir">Tagihan Air</label>
                    <select class="form-control" id="tagAir" name="tagAir">
                        <option value="" disabled selected>Pilih Tagihan</option>
                        <option value="3">&lt; Rp. 100,000,00</option>
                        <option value="2">Rp. 100,000,00 - Rp. 200,000,00</option>
                        <option value="1">&gt; Rp. 200,000,00</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tagListrik">Tagihan Listrik</label>
                    <select class="form-control" id="tagListrik" name="tagListrik">
                        <option value="" disabled selected>Pilih Tagihan</option>
                        <option value="3">&lt; Rp. 100,000,00</option>
                        <option value="2">Rp. 100,000,00 - Rp. 200,000,00</option>
                        <option value="1">&gt; Rp. 200,000,00</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>
