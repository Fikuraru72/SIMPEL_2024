@props([
    'data' => [],
])
<div>
    <table class="table table-bordered table-striped table-hover table-sm">
        <thead>
            <th>NIK</th>
            <th>Nama</th>
            <th>Pendapatan</th>
            <th>Tanggungan</th>
            <th>PBB</th>
            <th>Tagihan Air</th>
            <th>Tagihan Listrik</th>
        </thead>
        <tbody>
            @foreach ($data as $datas)
                <tr>
                    <td>{{ $datas->penduduk->NIK }}</td>
                    <td>{{ $datas->penduduk->nama }}</td>
                    <td>
                        @if($datas->pendapatan == 3)
                            &lt; Rp. 1,000,000,00
                        @elseif($datas->pendapatan == 2)
                            Rp. 1,000,000,00 - Rp. 3,000,000,00
                        @else
                            &gt; Rp. 3,000,000,00
                        @endif
                    </td>
                    <td>
                        @if($datas->tanggungan == 3)
                            &lt; 3 orang
                        @elseif($datas->tanggungan == 2)
                            3 - 5 orang
                        @else
                            &gt; 5 orang
                        @endif
                    </td>
                    <td>
                        @if($datas->pbb == 3)
                            &lt; Rp. 100,000,00
                        @elseif($datas->pbb == 2)
                            Rp. 100,000,00 - Rp. 300,000,00
                        @else
                            &gt; Rp. 300,000,00
                        @endif
                    </td>
                    <td>
                        @if($datas->tag_air == 3)
                            &lt; Rp. 100,000,00
                        @elseif($datas->tag_air == 2)
                            Rp. 100,000,00 - Rp. 200,000,00
                        @else
                            &gt; Rp. 200,000,00
                        @endif
                    </td>
                    <td>
                        @if($datas->tag_listrik == 3)
                            &lt; Rp. 100,000,00
                        @elseif($datas->tag_listrik == 2)
                            Rp. 100,000,00 - Rp. 200,000,00
                        @else
                            &gt; Rp. 200,000,00
                        @endif
                    </td>
                    {{-- <td>{{ $bansoso->status }}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
