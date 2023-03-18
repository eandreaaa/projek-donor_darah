<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dukes Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <h2>Data Pendonor</h2>
    <div style="display: flex; justify-content: center; margin-bottom: 30px">
        <a href="/logout" style="text-align: center">Logout</a>
        <div style="margin: 0 10px"> | </div>
        <a href="/" style="text-align: center">Home</a>
    </div>

    {{-- <form action="{{route('filter-data')}}" method="GET">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <select name="sort" id="sort" class="form-control filter">
                        <option selected hidden disabled>Sort by status</option>
                        <option value="Diterima">Diterima</option>
                        <option value="Ditolak">Ditolak</option>
                    </select>
                </div>
            </div>
        </div>
        <button type="submit">Submit</button>
    </form> --}}

    <div style="display: flex; justify-content: flex-end; align-items: center; padding: 0 30px">
        <form action="" method="GET">
            <input type="text" name="search" placeholder="Cari berdasarkan nama">
            <button type="submit" class="btn-login" style="margin-top: -1px">Cari</button>
        </form>
        
        <a href="{{route('dukes')}}" style="margin-left: 10px; margin-top: -10px">Refresh</a>
    </div>
    
    @if ($errors->any())
    <ul>
        @foreach ($errors as $error)
            <li>{{$error}}</li>  
        @endforeach
    </ul>
    @endif

    <div>
        @if (Session::get('berhasilAdd'))
        <div>
            <ul>{{Session('berhasilAdd')}}</ul>
        </div>
        @endif
    </div>

    <div style="padding: 0 30px">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Whatsapp</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Berat Badan</th>
                    <th scope="col">Gol. Darah</th>
                    <th scope="col">KTP</th>
                    <th scope="col">Status</th>
                    <th scope="col">Jadwal</th>
                    <th scope="col" style="text-align: center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp  
                
                {{-- @if (count($donors)>0) --}}
                    
                @foreach ($donors as $org)  
                <tr>

                    <th>{{$no++}}</th>
                    <td>{{$org['nama']}}</td>
                    <td>{{$org['email']}}</td>
                    <td>{{$org['hp']}}</td>
                    <td>{{$org['umur']}}</td>
                    <td>{{$org['berat']}}</td>
                    <td>{{$org['goldar']}}</td>
                    <td>
                        <a href="../assets/imges/{{$org->foto}}" target="_blank">
                            <img src="{{asset('assets/imges/'.$org->foto)}}" width="120">
                        </a>
                    </td>
                    <td>
                        {{-- @if ($org->penerimaan)
                            {{ $org->penerimaan['status']}}
                        @else
                            -
                        @endif --}}
                        {{-- {{$org->penerimaan['status']}} --}}

                        @if(isset($org->penerimaan['donor_id']))
                        @if(isset($org->penerimaan['jadwal']))
                            @if ($org->penerimaan['status'] == 'Ditolak')
                                Ditolak
                            @elseif ($org->penerimaan['status'] == 'Pending')
                                Pending
                            @else
                                Diterima
                            @endif
                        @endif
                        @endif
                    </td>
                    <td>
                        {{-- @if ($org->penerimaan)
                            {{ $org->penerimaan['jadwal']}}
                        @else
                            -
                        @endif --}}

                        @if(isset($org->penerimaan['donor_id']))
                        @if(isset($org->penerimaan['jadwal']))
                            @if ($org->penerimaan['status'] == 'Ditolak')
                                -
                            @else
                                {{$org->penerimaan['jadwal']}}
                            @endif
                        @endif
                        @endif

                        {{-- {{ $org->penerimaan['jadwal']}} --}}
                    </td>
                    <td>
                    <a href="{{route('aksi', $org->id)}}" class="btn btn-warning" style="margin-top: 10px">Buat status</a>
                    </td>
                </tr>
                @endforeach
                {{-- @else
                @endif --}}
            </tbody>
        </table>
    </div>
        
    {{-- @section('js')
    <script type="text/javascript">
    let penerimaan = $("#sort").val()
        $(".filter").on('change', function(){
            console.log("FILTER");
            penerimaan = $("#sort").val()
        })
        </script>
        @endsection --}}
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</html>