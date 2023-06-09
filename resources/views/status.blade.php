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
    <form action="{{route('update', $pendonor->id)}}" method="POST">
        @method('PATCH')
        @csrf
        <div class="d-flex justify-content-center align-items-center  mt-5">
            <div class="card w-50">
                <div class="card-header">
                    <center>Jadwal Pendonor</center> 
                </div>
                <select class="form-select" name="status" aria-label="Default select example">
                    <option value="Diterima"  {{ $pendonor->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                    <option value="Ditolak"  {{ $pendonor->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>

                <input type="date" name="jadwal" class="form-control" value="{{$pendonor->jadwal}}">

                <div class="my-3">
                    <button class="btn btn-success" type="submit">Kirim Response</button>
                    <a class="btn btn-primary" href="{{route('dukes')}}">Kembali</a>
                </div>
            </div>
        </div>

    </form>
</form>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</html>