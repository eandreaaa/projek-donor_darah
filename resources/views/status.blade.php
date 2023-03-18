<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Penjadwalan</title>
</head>

<body>
    {{-- <form action="{{route('update', $donorId)}}" method="POST" style="width: 500px; margin: 50px auto; display: block;">
        @csrf
        @method('PATCH')
        <div class="input-card">
            <label for="">Status</label>

                @if ($donor)
                <select name="status" id="status">
                    <option value="Diterima" {{ $donor['status'] == 'Diterima' ? 'selected' : ''}}>Diterima</option>
                    <option value="Ditolak" {{ $donor['status'] == 'Ditolak' ? 'selected' : ''}}>Ditolak</option>
                </select>
                @else
                    <select name="status" id="status">
                        <option selected hidden disabled>Pilih Status</option>
                        <option value="Diterima">Diterima</option>
                        <option value="Ditolak">Ditolak</option>
                    </select>
                @endif
            </div>

            <div class="input-card">
                <label for="">Penjadwalan</label>
                @if ($donor)
                    <input type="datetime" name="jadwal" value=" {{$donor ? $donor['jadwal'] : ''}}">
                @else
                    <input type="date" name="date" id="date">
                @endif
            </div>

            <button type="submit">Send</button>
    </form> --}}

    {{-- @if ($errors->any())
                     <strong>Whoops!</strong> There were some problems with your input.<br><br>
                          @foreach ($errors->all() as $error)
                              {{ $error }}<br>
                          @endforeach 
    @endif --}}
    <form action="{{route('update', $donorId)}}" method="POST" style="width: 500px; margin: 50px auto; display: block;">
        @csrf
        @method('PATCH')
        <div class="input-card">
            <label for="">Status</label>

            {{-- @if ($donor) --}}
            {{-- <select name="status" id="status">
                <option value="Ditolak" {{ $donor['status'] == 'Ditolak' ? 'selected' : ''}}>Ditolak</option>
                <option value="Diterima" {{ $donor['status'] == 'Diterima' ? 'selected' : ''}}>Diterima</option>
            </select> --}}
            {{-- @else --}}
                <select name="status">
                <option selected hidden disabled>Pilih Status</option>
                <option value="Ditolak" {{ $donor->status == 'Ditolak' ? 'selected' : ''}}>Ditolak</option>
                <option value="Diterima" {{ $donor->status == 'Diterima' ? 'selected' : ''}}>Diterima</option>
            </select>
            {{-- @endif --}}
            
        </div>

        <div class="input-card">
            <label for="pesan">Jadwal</label>

            @if ($donor == 'Ditolak')
                {{"anda ditolak"}}
            @else
                @if ($donor)
                    <input type="date" name="jadwal" value="{{ $donor ? $donor['jadwal'] : ''}}">
                @else
                    <input type="date" name="jadwal" id="jadwal">
                @endif
            @endif

            {{-- @if ($donor =)
                
            @else
                
            @endif --}}
        </div>

        <button class="btn btn-success" type="submit">Kirim Response</button>
            <a class="btn btn-primary" href="{{route('dukes')}}">Kembali</a>
    </form>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</html>