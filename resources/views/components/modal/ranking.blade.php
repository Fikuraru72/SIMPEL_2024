@props([
    'data' => [],
])

<div>
    <table class="table table-bordered table-striped table-hover table-sm">
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
