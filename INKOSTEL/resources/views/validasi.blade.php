<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Validasi</title>
</head>
<body>
    @extends('partial.navbar')
    @section('isi')     
    <div class="container p-4">
        <h2 class="text-center pb-3">Validasi Iklan</h2>
        <table class="table table-striped table-hover p-7">
            <thead style="background-color:gray">
                <tr>
                    <th scope="col">ID Kos</th>
                    <th scope="col">Nama Kos</th>
                    <th scope="col">Harga Pertahun</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($validation as $data)
                <form action="/updateData/{{ $data->id_kos }}" method="get">
                    <tr>
                        <td>{{ $data->id_kos }}</td>
                        <td>{{ $data->nama_kos}}</td>
                        <td>{{ $data->harga_kos_pertahun }}</td>
                        <td><button class="btn btn-primary" type="submit">Cek</button></td>
                    </tr>
                </form>
                @endforeach
            </tbody>
        </table>
    </div>
    
    @endsection
    @section('script')
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
    @endsection
</body>
</html>