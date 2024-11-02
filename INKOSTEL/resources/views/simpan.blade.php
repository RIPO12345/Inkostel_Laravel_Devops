<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simpan Kost</title>

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/simpan.css') }}">
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
            @foreach($dataKos as $kos)
            <div class="col-md-3 mb-4" id="coba">
                <div class="card" id=cobacard>
                    <div class="border-image" id="carouselIdValue">
                        <div class="carousel inner">
                            <div class="carousel-item active">
                            <img src="{{ asset('img/' . $kos->gambar_kos1) }}" class="d-block w-100" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="card-body">    
                        <p style="display: none;" >{{ $kos->id_kos }}</p>
                        <h5 class="card-title" data-href="{{ route('detailkos', ['id_kos' => $kos->id_kos]) }}" onclick="handleCardClick(this)">{{ $kos->nama_kos}}</h5>
                        <p class="card-text1" data-harga="{{ $kos->harga_kos_pertahun }}" data-href="{{ route('detailkos', ['id_kos' => $kos->id_kos]) }}" onclick="handleCardClick(this)">{{ $kos->harga_kos_pertahun }}</p>
                        <p id="jarak-{{ $kos->id }}" class="card-text2" data-href="{{ route('detailkos', ['id_kos' => $kos->id_kos]) }}" onclick="handleCardClick(this)">{{ $kos->jarak_kos}}</p>
                
                        <form action="{{ route('hapus.simpan', ['id' => $kos->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="bookmark-btn" onclick="deletekos(this)">
                                <i class=" bi-bookmark"></i> 
                            </button>
                        </form>
                    </div>
                </div>
            </div>
             @endforeach
        </div>
                <!-- Tombol paginate -->
                <div class="pagination">
            @if ($dataKos->onFirstPage())
                <span class="disabled">&laquo;</span>
            @else
                <a href="{{ $dataKos->previousPageUrl() }}" rel="prev">&laquo;</a>
            @endif

            @foreach ($dataKos->getUrlRange(1, $dataKos->lastPage()) as $page => $url)
                @if ($page == $dataKos->currentPage())
                    <span class="current">{{ $page }}</span>
                @else
                    <a href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach

            @if ($dataKos->hasMorePages())
                <a href="{{ $dataKos->nextPageUrl() }}" rel="next">&raquo;</a>
            @else
                <span class="disabled">&raquo;</span>
            @endif
        </div>
    </div>
    <!-- end main -->

    <!-- script js -->
   
    <script src="{{ asset('js/simpan.js') }}"></script>
    @endsection
    
  </body>
</html>

 

