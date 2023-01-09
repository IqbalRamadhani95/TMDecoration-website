@extends('user.base')

@section('konten')
    <div class="gambar">
        <img src="./images/logo.jpg" alt="" class="img-responsive gambar-navbar">
    </div>

    {{-- tambah ke hsotinger --}}
    <div class="container">
        <div class="card-caraPesan">
            <div class="judul-section-produk">
                <h4 style="font-weight: 700;">Cara Pemesanan</h4>
            </div>
            <div class="cara_pesan_body d-flex" style="align-items: center">
                <img src="./images/icon_web.png" alt="" style="width: 50px;">
                <p>1. Lakukan login atau registrasi terlebih dahulu</p>
            </div>
            <div class="cara_pesan_body d-flex" style="align-items: center">
                <img src="./images/icon_produk.png" alt="" style="width: 50px;">
                <p>2. Klik halaman produk untuk melihat daftar produk</p>
            </div>
            <div class="cara_pesan_body d-flex" style="align-items: center">
                <img src="./images/detail-produk.jpg" alt="" style="width: 50px;">
                <p>3. Pilih produk yang sesuai, lalu klik cek detail </p>
            </div>
            <div class="cara_pesan_body d-flex" style="align-items: center">
                <img src="./images/pesanan.jpg" alt="" style="width: 50px;">
                <p>4. Jika produk cocok, Klik pesan lalu cek kesediaan produk. Jika tersedia, lalu pilih pesan/masukkan list, lalu isi form dan cek di halaman pesanan untuk proses selanjutnya</p>
            </div>
            <div class="cara_pesan_body d-flex" style="align-items: center">
                <img src="./images/upload-bukti.png" alt="" style="width: 50px;">
                <p>5. check data pesanan, klik cek pembayaran dan akan muncul no rek pembayaran, klik upload untuk mengunggah bukti bayar</p>
            </div>
            <div class="cara_pesan_body d-flex" style="align-items: center">
                <img src="./images/antar-pesanan.png" alt="" style="width: 50px;">
                <p>6. Tunggu Konfirmasi admin sampai status berubah menjadi pembayaran berhasil, pemesanan akan di proses dan anda akan dihubungi oleh admin</p>
            </div>
        </div>
    </div>
@endsection