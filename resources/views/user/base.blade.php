<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }} ">
    <title>Tunas Muda</title>
</head>

<body>
    <!-- section-navbar -->
    {{-- <div class="navbar-section"> --}}
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light {{ request()->is('/') ? 'bg-light' : 'bg-grey' }} fixed-top">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('/images/Tunas-Muda1.png') }}" alt="" class="img-responsive navbar-img-home">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                    <a class="nav-link" href="/produk">Produk</a>
                    <a class="nav-link" href="/cara_pesan">Cara pemesanan</a>
                    <a class="nav-link" href="/contact">Kontak kami</a>

                    @if (Route::has('loginUser'))
                        @auth
                            <a class="nav-link" href="/pesanan">Pesanan</a>
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
                                                                Qty : {{ $item->jml_keranjang }}
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
                                        <form action="/checkout/{{ Auth::user()->id }}" method="get">
                                            <button type="submit" class="btn btn-bayar">
                                                Bayar
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="btn auth-user nav-link2 dropdown-toggle" data-bs-toggle="dropdown" href="#"
                                    role="button" aria-expanded="false">
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

        </nav>
    </div>
    {{-- </div> --}}
    <!--end section-navbar -->
  

    @yield('konten')

    {{-- section footer --}}
    <div class="footer">
        <div class="container">
            <div class="row row row-cols-2 g-4">
                <div class="col">
                    <p>Copyright © 2022 Tunas-Muda. All rights reserved.</p>
                </div>
                <div class="col me-auto">
                    <p style="float: right">Watugede, Jatisrono, Wonogiri</p>
                </div>
            </div>
        </div>
    </div>
    {{-- end section footer --}}

    <script>
        function total() {
            var harga = document.getElementById('harga').value;
            var jumlah = document.getElementById('jumlah_produk').value;
            var hasil = parseInt(harga) * parseInt(jumlah);

            if (!isNaN(hasil)) {
                document.getElementById('total_harga').value = hasil;
            }
        }

        function total2() {
            var harga = document.getElementById('harga2').value;
            var jumlah = document.getElementById('jumlah_produk2').value;
            var hasil = parseInt(harga) * parseInt(jumlah);

            if (!isNaN(hasil)) {
                document.getElementById('total_harga2').value = hasil;
            }
        }

        function cek() {
            let tgl_awal = document.getElementById('tanggal_sewa').value;
            let tgl_akhir = document.getElementById('tanggal_selesai').value;
            if (new Date(tgl_akhir) < new Date(tgl_awal)) {
                alert('Tolong periksa kembali tanggal anda');
                document.getElementById('tanggal_selesai').value = null;
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
