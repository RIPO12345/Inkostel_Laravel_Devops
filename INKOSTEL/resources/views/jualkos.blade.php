<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>InKosTel Iklan Kost</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@2.10.2/dist/umd/popper.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../css/jualKos.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="{{ asset('css/jualKos.css') }}">
</head>

<body>
  @extends('partial.navbar')

  @section('isi')
  <!-- main -->
  <section id="JualKosForm">
    <div class="container">
      <div class="text-center mt-5">
        <h2>Iklankan Sekarang Juga!</h2>
        <p>Isi Form Untuk Mendaftar</p>
      </div>

      <div class="row justify-content-center my-5">

        <div class="col-lg-6">
          <form action="{{ route('jualkos') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="exampleInputEmail1" class="form-label">Nama Kost</label>
            <div class="mb-4 input-group">
              <span class="input-group-text">
                <i class="bi bi-person-fill"></i>
              </span>
              <input type="text" class="form-control" name="nama_kos" id="nama_kos" placeholder="e.g. Kost Putra">
            </div>

            <label for="Alamat" class="form-label">Alamat:</label>
            <div class="mb-4 input-group">
              <span class="input-group-text">
                <i class="bi bi-geo-alt-fill"></i>
              </span>
              <input type="text" class="form-control" name="alamat" id="alamat"
                placeholder="e.g. Sulanjana No 45 Blok H1">
            </div>

            <label for="jarak_kos" class="form-label">Jarak:</label>
            <div class="row g-3 align-items-center">
              <div class="col-auto">
                <input type="text" id="jarak_kos" name="jarak_kos" class="form-control">
              </div>
              <div class="col-auto">
                <span id="jarak_kos" class="form-text">
                  / Meter
                </span>
              </div>
            </div>



            <br>

            <label for="Nomor" class="form-label">Nomor Handphone:</label>
            <div class="mb-4 input-group">
              <span class="input-group-text" id="ContactPerson">
                <i> +62 </i>
              </span>
              <input type="text" class="form-control" name="ContactPerson" id="ContactPerson" placeholder="">
            </div>

            <label for="Harga" class="form-label">Tentukan Harga:</label>
            <div class="form-check">

              <label for="Harga" class="form-label">Tahunan</label>
              <div class="mb-4 input-group">
                <span class="input-group-text" id="harga_kos_pertahun">
                  <i> Rp </i>
                </span>
                <input type="text" class="form-control" name="harga_kos_pertahun" id="harga_kos_pertahun"
                  placeholder="e.g. 1000000" required>
              </div>

              <label for="Harga" class="form-label">Bulanan (Opsional)</label>
              <div class="mb-4 input-group">
                <span class="input-group-text" id="harga_kos_perbulan">
                  <i> Rp </i>
                </span>
                <input type="text" class="form-control" name="harga_kos_perbulan" id="harga_kos_perbulan"
                  placeholder="e.g. 1000000">
              </div>
            </div>

            <label for="InputGambar" class="form-label">Unggah Tampilan Kamar</label>
            <div class="mb-4 input-group">
                <input class="form-control" type="file" name="gambar_kos1[]" id="gambar_kos1" multiple>
            </div>

            <div class="form-floating mb-4 mt-4">
              <textarea id="Deskripsi" class="form-control" style="height: 140px;" name="Deskripsi"
                id="Deskripsi"></textarea>
              <label for="Deskripsi" class="form-label">Deskripsi...</label>
            </div>

            <div class="mb-4 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>

          </form>
        </div>
  </section>
  @endsection



  @section('script')
  <script src="../Bootstrap/js/bootstrap.min.js"></script>
  <script src="../js/jualKos.js"></script>
  @endsection



</body>

</html>
