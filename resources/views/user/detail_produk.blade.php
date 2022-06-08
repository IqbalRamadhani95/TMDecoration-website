<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="/css/all.css">
  <link rel="stylesheet" href="/css/style.css">
  <title>Document</title>
</head>
<body>
  <div class="navbar-section">
    <nav class="navbar navbar-expand-lg navbar-light {{request()->is('/')? 'bg-light':'bg-grey'}} fixed-top">
            <div class="container">
              <a class="navbar-brand" href="#">
                <img src="/images/Tunas-Muda1.png" alt="" class="img-responsive navbar-img">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                  <a class="nav-link" aria-current="page" href="/">Beranda</a>
                  <a class="nav-link" href="/produk">Produk</a>
                  <a class="nav-link" href="#">Pesanan</a>
                  <a class="nav-link" href="/cara_pesan" >Cara pemesanan</a>
                  <a class="nav-link" href="/contact">Kontak kami</a>
                  <a class="nav-link" href="/login-user" >
                    <button class="btn-login d-flex">
                      <i class="fas fa-sign-in-alt" style="align-self: center; color:#ffff; margin-right: 5px;"></i>
                      Login
                    </button>
                  </a>
                </div>
              </div>
            </div>
          </nav>
    </div>
    {{-- section konten --}}
   <div class="container">    
    <div class="detail_produk">
        <div class="row">
            <div class="col-md-5">
              <div class="detail_produk_img">
                  <img src="/storage/images/{{ $data->foto }}" alt="" class="img-responsive detail_produk_img">
              </div>
            </div>
            <div class="col-md-7 deskripsi">
              <h4>{{ $data->nama_produk }}</h4>
              <h5 class="mt-4">Rp. {{ number_format($data->harga_sewa, 2) }}</h5>
              <h6 class="mt-4">Deskripsi :</h6>
              <p>{{ $data->deskripsi }}</p>
              <h6 class="mt-4">Note :</h6>
              <p>Lakukan konfirmasi pembayaran pada menu pesanan setelah melakukan pemesanan produk!</p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="form_pesanan">
        <h5>Form Pemesanan</h5>
        <form class="row">
            <div class="col-md-6 mt-2">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama">
            </div>
            <div class="col-md-6 mt-2">
              <label for="nomor" class="form-label">Nomer hp/WA</label>
              <input type="password" class="form-control" id="nomor">
            </div>
            <div class="col-md-12 mt-2">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat">
            </div>
            <div class="col-md-6 mt-2">
              <label for="waktu-mulai" class="form-label">Waktu mulai sewa</label>
              <input type="date" class="form-control" id="waktu-mulai">
            </div>
            <div class="col-md-6 mt-2">
              <label for="waktu-selesai" class="form-label">Waktu berakhir sewa</label>
              <input type="date" class="form-control" id="waktu-selesai">
            </div>
            <div class="mt-4">
              <button type="submit" class="btn btn-pesan">Pesan sekarang</button>
            </div>
          </form>
    </div>
</div>
{{-- end section konten --}}

 {{-- section footer --}}
 <div class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <p>Copyright © 2022 Tunas-Muda. All rights reserved.</p>
      </div>
      <div class="col-md-6 me-auto">
        <p style="float: right">Watugede, Jatisrono, Wonogiri</p>
      </div>
    </div>
  </div>
</div>
{{-- end section footer --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>