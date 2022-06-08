<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Tunas Muda</title>
</head>
<body>
    <!-- section-navbar -->
    <div class="navbar-section">
    <nav class="navbar navbar-expand-lg navbar-light {{request()->is('/')? 'bg-light':'bg-grey'}} fixed-top">
            <div class="container">
              <a class="navbar-brand" href="#">
                <img src="./images/Tunas-Muda1.png" alt="" class="img-responsive navbar-img">
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
    <!--end section-navbar -->
    <div class="gambar">
        <img src="./images/logo.jpg" alt="" class="img-responsive gambar-navbar">
    </div>
    {{-- <div class="brand">
      <h1>Tunas Muda Decoration</h1>
    </div> --}}
    
    @yield('konten')

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