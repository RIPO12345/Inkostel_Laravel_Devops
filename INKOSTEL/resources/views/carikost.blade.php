<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>InKosTel Cari Kost</title>

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/carikost.css') }}">
    <!-- Sertakan token CSRF dalam meta tag -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    @extends('partial.navbar')

    @section('isi')
    <!-- Tombol Filter Pencarian -->
    <div class="filter-button">
        <button type="button" class="btn" data-filter="semua">Semua</button>
        <button type="button" class="btn" data-filter="terdekat">Terdekat</button>
        <button type="button" class="btn" data-filter="termurah">Termurah</button>
        <button type="button" class="btn" data-filter="putra">Putra</button>
        <button type="button" class="btn" data-filter="putri">Putri</button>
    </div>

   <!-- main -->
    <div class="container my-5" id="conmain">
        <div class="row row-cols-1 row-cols-md-3 g-0" id="card">
            <!-- akan di foreach -->
            @foreach($carikos as $data)
            <div class="col-md-3 mb-4" id="coba">
                <div class="card" id=cobacard>
                    <div class="border-image" id="carouselIdValue">
                        <div class="carousel inner">
                            <div class="carousel-item active">
                            <img src="{{ asset('img/' . $data->gambar_kos1) }}" class="d-block w-100" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="card-body">    
                        <p style="display: none;" >{{ $data->id_kos }}</p>
                        <h5 class="card-title" data-href="{{ route('detailkos', ['id_kos' => $data->id_kos]) }}" onclick="handleCardClick(this)">{{ $data->nama_kos}}</h5>
                        <p class="card-text1" data-harga="{{ $data->harga_kos_pertahun }}" data-href="{{ route('detailkos', ['id_kos' => $data->id_kos]) }}" onclick="handleCardClick(this)">{{ $data->harga_kos_pertahun }}</p>
                        <p id="jarak-{{ $data->id }}" class="card-text2" data-href="{{ route('detailkos', ['id_kos' => $data->id_kos]) }}" onclick="handleCardClick(this)">{{ $data->jarak_kos}}</p>
                        <button class="bookmark-btn" data-id="{{ $data->id_kos }}" onclick="bookmarkKost(this)">
                            <i class="bi bi-bookmark"></i>
                        </button>
                
                   
                    </div>
                </div>
            </div>
             @endforeach
        </div>
                <!-- Tombol paginate -->
                <div class="pagination">
            @if ($carikos->onFirstPage())
                <span class="disabled">&laquo;</span>
            @else
                <a href="{{ $carikos->previousPageUrl() }}" rel="prev">&laquo;</a>
            @endif

            @foreach ($carikos->getUrlRange(1, $carikos->lastPage()) as $page => $url)
                @if ($page == $carikos->currentPage())
                    <span class="current">{{ $page }}</span>
                @else
                    <a href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach

            @if ($carikos->hasMorePages())
                <a href="{{ $carikos->nextPageUrl() }}" rel="next">&raquo;</a>
            @else
                <span class="disabled">&raquo;</span>
            @endif
        </div>
    </div>
    <!-- end main -->
    
    <!-- script js -->
    <script src="{{ asset('js/carikost.js') }}"></script>

    @endsection
  </body>
</html>
