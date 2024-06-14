<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

    <body>
        <div class=" py-3 py-md-5">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-12 col-md-11 col-lg-8 col-xl-7 col-xxl-6">
                        <div class="bg-white p-4 p-md-5 rounded shadow-sm">
                            <div>
                                <h1 class="row justify-content-md-center">SIMPEL</h1>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-5">
                                        <h4>Lupa Password</h4>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="{{ url('searchPswd')}}">
                                @csrf
                                <div class="row gy-3 gy-md-4 overflow-hidden">
                                    <div class="col-12">
                                        <label for="nokk" class="form-label">No KK<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="nokk" id="nokk" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="nik" class="form-label">NIK<span
                                                class="text-danger">*</span></label>
                                        <input type="nik" class="form-control" name="nik" id="nik"
                                            value="" required>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn btn-lg btn-primary" type="submit">Cari Sekarang</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
