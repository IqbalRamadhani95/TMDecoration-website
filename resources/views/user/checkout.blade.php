@extends('user.base')

@section('konten')
    <div class="gambar">
        <img src="/images/logo.jpg" alt="" class="img-responsive gambar-navbar">
    </div>

    <div class="container">
        <div class="card-produk">
            <div class="judul-section-produk">
                <h4 style="font-weight: 700;">Checkout</h4>
            </div>
            <div class="row g-5">
                <div class="col-md-4">
                    <p class="text-center" style="font-size: 16px; font-weight:500;">Produk Dipesan</p>
                    <div class="row row-cols-md-2 g-3">
                        @foreach ($keranjang as $kr)
                            <div class="col">
                                <div class="produk_dipesan">
                                    <div>
                                        <img src="/storage/images/{{ $kr->foto }}" alt=""
                                            class="img-responsive img_checkout">
                                    </div>
                                    <div class="text-center">
                                        <p style="margin-top: 5px; font-size:14px; font-weight:500; color:#c9981e;">{{ $kr->nama_produk }}</p>
                                        <p style="margin-top: -9px; font-size:13px; font-weight:500;">Qty : {{ $kr->jml_keranjang }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-8">
                    <p class="text-center" style="font-size: 16px; font-weight:500;">Form Pesanan</p>
                    <form class="row form-checkout" action="/tambah-pesanan" method="post">
                        @csrf
                        <div class="col-md-6 mt-2">
                            <label for="nama_pelanggan" class="form-label" id="label_pesanan">Nama</label>
                            <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan"
                                value="{{ Auth::User()->name }}" required>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="id_invoice" class="form-label" id="label_pesanan">id_invoice</label>
                            <input type="text" class="form-control" name="id_invoice" id="id_invoice"
                                value="TM{{ rand() }}" readonly>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="tanggal_sewa" class="form-label" id="label_pesanan">Tanggal Mulai</label>
                            <input type="date" class="form-control" name="tanggal_sewa" id="tanggal_sewa"  required>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="tanggal_selesai" class="form-label" id="label_pesanan">Tanggal Selesai</label>
                            <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai" onchange="cek()" required>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="noHp" class="form-label" id="label_pesanan">Nomer hp/WA</label>
                            <input type="text" class="form-control" name="noHp" id="noHp" required>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="alamat" class="form-label" id="label_pesanan">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" required>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="total_harga" class="form-label" id="label_pesanan">Total Harga</label>
                            <input type="text" class="form-control" name="total_harga" id="total_harga"
                                value="{{ $keranjang->sum('total_harga') }}" required>
                        </div>
                        <div class="col-md-6 mt-4">
                            <button type="submit" class="btn btn-pesan3">Pesan sekarang</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
