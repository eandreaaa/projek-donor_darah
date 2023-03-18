<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <h2>Laporan Keluhan</h2>
    <div style="display: flex;">
        {!! $donors->links() !!}
    </div>

    <div style="display: flex; justify-content: center; margin-bottom: 30px">
        <a href="/logout" style="text-align: center">Logout</a>
        <div style="margin: 0 10px"> | </div>
        <a href="{{route('export-pdf')}}">Download PDF</a>
        <div style="margin: 0 10px"> | </div>
        <a href="{{route('export-excel')}}">Download Excel</a>
    </div>

    <div style="display: flex; justify-content: flex-end; align-items: center; padding: 0 30px">
        <form action="" method="GET">
            <input type="text" name="search" placeholder="Cari berdasarkan nama">
            <button type="submit" class="btn-login" style="margin-top: -1px">Cari</button>
        </form>
        
        <a href="{{route('admin')}}" style="margin-left: 10px; margin-top: -10px">Refresh</a>
    </div>
    
    <div style="padding: 0 30px">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Whatsapp</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Berat Badan</th>
                    <th scope="col">Gol. Darah</th>
                    <th scope="col">KTP</th>
                    <th scope="col">Aksi</th>
                    <th scope="col">Status</th>
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
                    
                    @php
                        $hub = substr_replace($org->hp, "62", 0, 1);
                        if ($org->penerimaan == 'Diterima') {
                            $Wa = 'Halo ' . $org->nama . '! Donor darah anda ' . $org->penerimaan['status'] . '. Silakan datang pada ' . $org->penerimaan['jadwal'];
                        } else {
                            $Wa = 'Halo ' . $org->nama . '. Maaf, anda ditolak untuk menjadi pendonor dikarenakan tidak sesuai syarat. Terima kasih.';
                        }
                    @endphp

                    <td><a href="https://wa.me/{{$hub}}/?text={{$Wa}}" target="_blank">{{$hub}}</a></td>
                    <td>{{$org['umur']}}</td>
                    <td>{{$org['berat']}}</td>
                    <td>{{$org['goldar']}}</td>
                    <td>
                        <a href="../assets/imges/{{$org->foto}}" target="_blank">
                            <img src="{{asset('assets/imges/'.$org->foto)}}" width="120">
                        </a>
                    </td>
                    <td>
                        @if ($org->penerimaan['status'] == 'Ditolak')
                            Ditolak
                        @else
                            Diterima
                        @endif
                    </td>
                    <td>
                        @if ($org->penerimaan['status'] == 'Ditolak')
                            -
                        @else
                            {{$org->penerimaan['jadwal']}}
                        @endif
                    </td>
                    <td>
                        <form action="{{route('destroy', $org->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</html>