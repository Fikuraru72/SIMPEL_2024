<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penerima Bansos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            position: relative;
            margin: 0;
            padding-bottom: 150px;
            /* Adjust this value if necessary */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .signature {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .signature div {
            width: 30%;
            text-align: center;
            display: flex;
            justify-content: space-between;
        }

        .centered-h4 {
            text-align: center;
            margin-top: 0;
        }
    </style>
</head>

<body>
    <h4 class="centered-h4">Data Penerima Bantuan Sosial</h4>
    <h5 class="centered-h4"> RW 04 Kelurahan Jatimulyo, Kecamatan Lowokwaru, Kota Malang</h5>
    <br><br><br>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Ranking</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $datas)
                    <tr>
                        <td>{{ $datas->ranking }}</td>
                        <td>{{ $datas->NIK }}</td>
                        <td>{{ $datas->nama }}</td>
                        <td>{{ $datas->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="signature">
            <div>
                <p>Malang, {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
                <p><strong>Ketua Rw.04</strong></p>
                <br><br><br>
                <p>_________________________</p>
            </div>
            <div>
                <b><p>Hadi Kadarman</p></b>
            </div>
        </div>
    </div>
</body>

</html>
