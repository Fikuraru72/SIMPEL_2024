<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penerima Bansos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Data Penerima Bansos</h2>
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
</body>
</html>
