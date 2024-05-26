<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Menambah Data Penduduk Baru</h4>
            <form class="forms-sample" action="{{ url('datapenduduk/store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Nama</label>
                    <input type="text" class="form-control" name="nama" id="exampleInputName1" placeholder="Nama"
                        required>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">NIK</label>
                    <input type="text" class="form-control" name="nik" id="exampleInputName1" placeholder="NIK"
                        required>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">No.KK</label>
                    <input type="text" class="form-control" name="no_kk" id="exampleInputName1" placeholder="No.KK"
                        required>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir" id="exampleInputName1" required>
                </div>
                <div class="form-group">
                    <label for="exampleSelectGender">Agama</label>
                    <select class="form-select" name="agama">
                        <option>Islam</option>
                        <option>Katolik</option>
                        <option>Protestan</option>
                        <option>Hindu</option>
                        <option>Budha</option>
                        <option>Khonghuchu</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleSelectGender">Gender</label>
                    <select class="form-select" name="gender" id="exampleSelectGender">
                        <option>Pria</option>
                        <option>Wanita</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleSelectGender">Status Nikah</label>
                    <select class="form-select" name="status_nikah" id="exampleSelectGender">
                        <option>Belum Kawin</option>
                        <option>Kawin</option>
                        <option>Cerai Hidup</option>
                        <option>Cerai Mati</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleSelectGender">Status Keluarga</label>
                    <select class="form-select" name="status_keluarga" id="exampleSelectGender">
                        <option>Kepala Keluarga</option>
                        <option>Anggota Keluarga</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleSelectGender">RT</label>
                    <select class="form-select" name="rt">
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
                    <label for="exampleInputCity1">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="exampleInputCity1"
                        placeholder="Alamat" required>
                </div>

                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button type="reset" class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>
