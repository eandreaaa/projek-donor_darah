<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pendonor Darah</title>
</head>
<body>
    <h2 style="text-align: center; margin-bottom: 20px;">Data Pendonor Darah Baru</h2>
    <table style="width: 100%">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama</th>
                <th scope="col">Whatsapp</th>
                <th scope="col">Umur</th>
                <th scope="col">Berat Badan</th>
                <th scope="col">Gol. Darah</th>
                <th scope="col">KTP</th>
                <th scope="col">Status</th>
                <th scope="col">Jadwal</th>
            </tr>
        </thead>

        <tbody>
            @php
                $no = 1;
            @endphp    
            @foreach ($donors as $org)  
            <tr>

                <th>{{$no++}}</th>
                <td>{{$org['nama']}}</td>
                <td>{{$org['hp']}}</td>
                <td>{{$org['umur']}}</td>
                <td>{{$org['berat']}}</td>
                <td>{{$org['goldar']}}</td>
                <td><img src="assets/imges/{{$org['foto']}}" width="60"></td>
                <td>
                    @if ($org['penerimaan'])
                        {{ $org['penerimaan']['status']}}
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if ($org['penerimaan'])
                        @if ($org['penerimaan']['status'] == "Diterima")
                            {{-- {{ $org['penerimaan']['jadwal'] }} --}}
                            {{ is_null($org['penerimaan']['jadwal']) ? '-' : date('d M, Y', strtotime($org['penerimaan']['jadwal'])) }}
                        @else
                            -
                        @endif
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>