<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Tunas Muda</title>
</head>

<body>
    <!-- hero section -->
    <div class="hero-section">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container mt-3">
                <a class="navbar-brand" href="#">
                    <img src="./images/Tunas-Muda1.png" alt="" class="img-responsive navbar-img-home">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link" aria-current="page" href="/">Beranda</a>
                        <a class="nav-link" href="/produk">Produk</a>
                        <a class="nav-link" href="/cara_pesan">Cara pemesanan</a>
                        <a class="nav-link" href="/contact">Kontak kami</a>


                        @if (Route::has('loginUser'))
                            @auth
                                <a href="/pesanan" class="nav-link">Pesanan</a>
                                <li class="nav-item dropdown">
                                    <a class="btn cart nav-link2 dropdown-toggle" data-bs-toggle="dropdown" href="#"
                                        role="button" aria-expanded="false">
                                        <i class="bi bi-cart3"></i>
                                    </a>
                                    <ul class="dropdown-menu menu-cart">
                                        <li class="text-center" style="color: #3C3C3C; font-weight:bold;">List Pesanan</li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>

                                        @if (sizeof($keranjang) != 0)
                                            @foreach ($keranjang as $item)
                                                <li class="dropdown-item">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <img src="/storage/images/{{ $item->foto }}" alt=""
                                                                class="img-keranjang">
                                                        </div>
                                                        <div class="col-md-6" style="font-size: 13px; font-weight:500;">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <p>
                                                                        {{ $item->nama_produk }}
                                                                    <p style="margin-top: -10px;">Rp.
                                                                        {{ number_format($item->total_harga, 2) }}</p>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-6 text-center">
                                                                    Jml : {{ $item->jml_keranjang }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <form action="/hapus_keranjang" method="post">
                                                                @csrf
                                                                <input type="hidden" name="id_keranjang"
                                                                    value="{{ $item->id_keranjang }}">
                                                                <button type="submit" class="btn btn-hapusKeranjang">
                                                                    <i class="bi bi-trash3"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @else
                                            <li class="dropdown-item text-center">
                                                <p>produk kosong</p>
                                            </li>
                                        @endif
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li class="text-center">
                                            <form action="" method="">
                                                <button class="btn btn-bayar">
                                                    Bayar
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="btn auth-user nav-link2 dropdown-toggle" data-bs-toggle="dropdown"
                                        href="#" role="button" aria-expanded="false">
                                        <i class="bi bi-person-fill"></i>
                                    </a>
                                    <ul class="dropdown-menu menu-profil">
                                        <li class="text-center" style="color: #3C3C3C; font-weight:bold;">
                                            {{ Auth::User()->name }}</li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="/profil-user">Profil</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="/logout"
                                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">logout</a>
                                        </li>
                                    </ul>
                                </li>
                                <form id="logout-form" action="/logout" method="POST">
                                    @csrf
                                </form>
                            @else
                                <a class="nav-link" href="/loginUser">
                                    <button class="btn-login d-flex">
                                        <i class="fas fa-sign-in-alt"
                                            style="align-self: center; color:#ffff; margin-right: 5px;"></i>
                                        Login
                                    </button>
                                </a>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="hero-caption">
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <div class="caption-kanan">
                            <h2 class="mb-20">Rencanakan Kebutuhan Pernikahan Anda Bersama Kami</h2>
                            <p class="mb-20">Tunas Muda Decoration membantu anda dalam menyiapkan kebutuhan dekorasi
                                pernikahan dengan berkesan</p>
                            <a href="/contact">
                                <button class="btn-caption">
                                    Hubungi Kami
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end hero section -->

    <!-- layanan section -->
    <section class="section-layanan">
        <div class="container">
            <div class="layanan">
                <div class="judul-section text-center">
                    <h3>layanan</h3>
                </div>
                <div class="isi-layanan">
                    <div class="row row-cols-1 row-cols-md-3 g-5">
                        <div class="col">
                            <div class="konten-layanan text-center">
                                <p class="text-large"><i class="bi bi-bank"></i></p>
                                <h5>TENDA</h5>
                                <p class="caption-layanan">Tenda untuk kebutuhan acara pernikahan anda</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="konten-layanan text-center">
                                <p class="text-large"><i class="bi bi-slack"></i></p>
                                <h5>DEKORASI</h5>
                                <p class="caption-layanan">Dekorasi dengan konsep terbaru untuk segala acara</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="konten-layanan text-center">
                                <p class="text-large"><i class="bi bi-cup"></i></p>
                                <h5>ALAT DAPUR</h5>
                                <p class="caption-layanan">Berbagai jenis peralatan dapur untuk acara besar</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end layanan section -->

    <!-- galeri section -->
    <div class="container">
        <div class="galeri">
            <div class="judul-section text-center">
                <h3>Galeri / Dokumentasi</h3>
            </div>
            <div class="isi-galeri">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100 card-1">
                            <img src="./images/dekor1.jpeg" class="card-img-top home-img" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center">Background Minimalis</h5>
                                <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 card-1">
                            <img src="./images/dekor3.jpeg" class="card-img-top home-img" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center">Harga Terjangkau</h5>
                                <!-- <p class="card-text">This is a short card.</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 card-1">
                            <img src="./images/dekor4.jpeg" class="card-img-top home-img" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center">Desain Variatif</h5>
                                <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 card-1">
                            <img src="./images/dekor6.jpg" class="card-img-top home-img" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center">Item Lengkap</h5>
                                <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 card-1">
                            <img src="./images/dekor5.jpeg" class="card-img-top home-img" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center">Request Warna</h5>
                                <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 card-1">
                            <img src="./images/dekor21.jpeg" class="card-img-top home-img" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center">indoor/Outdoor</h5>
                                <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end galeri section -->
    {{-- section footer --}}
    <div class="footer">
        <div class="container">
            <div class="row row row-cols-2 g-4">
                <div class="col">
                    <p>Copyright ?? 2022 Tunas-Muda. All rights reserved.</p>
                </div>
                <div class="col me-auto">
                    <p style="float: right">Watugede, Jatisrono, Wonogiri</p>
                </div>
            </div>
        </div>
    </div>
    {{-- end section footer --}}
    <script src="./js/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>
