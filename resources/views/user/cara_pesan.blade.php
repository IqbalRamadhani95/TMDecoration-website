@extends('user.base')

@section('konten')
    <div class="cara-pesan">
        <div class="container">
            <div class="text-center judul-section2">
                <h2>Cara Pemesanan</h2>
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
                <p>3. Pilih produk yang sesuai, lalu klik lihat detail </p>
            </div>
            <div class="cara_pesan_body d-flex" style="align-items: center">
                <img src="./images/pesanan.jpg" alt="" style="width: 50px;">
                <p>4. Jika produk cocok, Klik pesan dan isi form pesanan, lalu check di halaman pesanan untuk proses selanjutnya</p>
            </div>
            <div class="cara_pesan_body d-flex" style="align-items: center">
                <img src="./images/upload-bukti.png" alt="" style="width: 50px;">
                <p>5. check data pesanan, lalu klik bayar untuk upload bukti bayar</p>
            </div>
            <div class="cara_pesan_body d-flex" style="align-items: center">
                <img src="./images/antar-pesanan.png" alt="" style="width: 50px;">
                <p>6. Tunggu Konfirmasi admin, dan produk akan diantar</p>
            </div>
        </div>
    </div>
@endsection