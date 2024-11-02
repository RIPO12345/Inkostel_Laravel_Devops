<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="{{ asset('front/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/detailKos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('front/css/detailKos.css') }}">
    <title>Accept</title>
</head>
<body>
<body>
    @extends('partial.navbar')
    @section('isi')
    <!-- body -->
    <div class="container" id="conbody">
        <div class="row justify-content-center">
            <div class="col">
                <h1>{{ $validation->nama_kos }}</h1>
                <div class="card mx-auto" style="width: 851px; height: 307px;">
                    <div class="card-body">
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('img/' . $validation->gambar_kos1) }}" class="d-block w-100" style="height: 270px;" alt="Kos Image 1" name="gambar_kos1">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('img/' . $validation->gambar_kos2) }}" class="d-block w-100" style="height: 270px;" alt="Kos Image 2" name="gambar_kos2">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('img/' . $validation->gambar_kos3)  }}" class="d-block w-100" style="height: 270px;" alt="Kos Image 3">
                                    </div>

                                    <div class="carousel-item">
                                        <img src="{{ asset('img/' . $validation->gambar_kos4)  }}" class="d-block w-100" style="height: 270px;" alt="Kos Image 4">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('img/' . $validation->gambar_kos5)  }}" class="d-block w-100" style="height: 270px;" alt="Kos Image 5">
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" id="detail">
            <div class="col-sm-4">
                <h2>Deskripsi</h2>
                <div class="info-section info-section custom-scrollbar">
                    <p>{{ $validation->Deskripsi }}</p>
                </div>

            </div>
            <div class="col-sm-4" id="harga">
                <div class="card" id="cardHarga" style="width: 390px; height: 194px;">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center;" id="harga-tahun">
                            Rp. <span id="harga-pertahun">
                                <?php
                                $harga_pertahun = $validation->harga_kos_pertahun;

                                // Membersihkan string dari tanda titik ribuan dan mengubahnya ke float
                                $harga_pertahun_float = floatval(str_replace(",", "", str_replace(".", "", $harga_pertahun)));

                                // Menggunakan number_format untuk format angka
                                echo number_format($harga_pertahun_float, 2, ',', '.');
                                ?>
                            </span>
                        </h5>
                        </h5>
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary dropdown-toggle" style="width: 10rem; color: #6DD6BF; border-color: #6DD6BF;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="text-color"> Harga</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" onclick="ubahHarga('pertahun')">Pertahun</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="ubahHarga('perbulan')">Perbulan</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary dropdown-toggle" style="width: 10rem; border-color: #6DD6BF;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="text-color"> Jarak</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"> {{number_format($validation->jarak_kos / 1000, 2) }} km</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <br>
                        <a href="https://wa.me/{{ $validation->ContactPerson }}" class="btn btn-outline-success d-block mx-auto bi bi-whatsapp">WhatsApp</a>
                        <!-- Menggunakan "d-block mx-auto" untuk mengatur tombol di tengah -->
                    </div>
                </div>


            </div>


            <script>
                function ubahHarga(jenisHarga) {
                    var hargaTahunElement = document.getElementById('harga-tahun');
                    var hargaPerBulan = parseFloat("{{$validation->harga_kos_perbulan}}".replace(",", ""));
                    var hargaPerTahun = parseFloat("{{$validation->harga_kos_pertahun}}".replace(",", ""));

                    if (jenisHarga === 'pertahun') {
                        hargaTahunElement.innerText = formatRupiah(hargaPerTahun);
                    } else if (jenisHarga === 'perbulan') {
                        hargaTahunElement.innerText = formatRupiah(hargaPerBulan);
                    }
                }

                function formatRupiah(angka) {
                    var formatter = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    });

                    return formatter.format(angka);
                }
            </script>
            <div class="row">
            <div class="col-sm-4" id="oktolak">
                <div class="row">
                    <div class="col">
                        <form method="GET" action="{{ route('terima', ['id_kos' => $validation->id_kos]) }}">
                            @csrf <!-- Tambahkan csrf token -->
                            <button class="btn btn-success" type="submit" id="terima">Terima</button>
                        </form>
                    </div>
                    <div class="col">
                        <form method="GET" action="{{ route('tolak', ['id_kos' => $validation->id_kos]) }}">
                            @csrf <!-- Tambahkan csrf token -->
                            <button class="btn btn-danger" type="submit" id="tolak">Tolak</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <!-- body end -->
    <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @endsection
    @section('script')
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/detailKos.js"></script>
    @endsection
</body>
</html>