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
                    <div class="produk_dipesan">
                        <img src="{{asset('storage/images/'. $produk->foto)}}" alt="" class="img_checkout2">
                        <p class="text-center" style="margin-top: 10px; font-size:14px; font-weight:500; color:#c9981e;">{{$produk->nama_produk}}</p>
                    </div>
                </div>

                <div class="col-md-8">
                    <p class="text-center" style="font-size: 16px; font-weight:500;">Form Pesanan</p>
                    <input type="hidden" name="harga" id="harga2" value="{{$produk->harga_sewa}}">
                    <form class="row form-checkout" action="/tambah-pesanan-direct" method="post">
                        @csrf
                        <input type="hidden" name="id_produk" value="{{$produk->id}}">
                        <input type="hidden" name="nama_item" value="{{$produk->nama_produk}}">
                        <div class="col-md-6 mt-2">
                            <label for="nama_pelanggan" class="form-label" id="label_pesanan">Nama</label>
                            <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" value="{{ Auth::User()->name }}" required>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="id_invoice" class="form-label" id="label_pesanan">id_invoice</label>
                            <input type="text" class="form-control" name="id_invoice" id="id_invoice" value="TM{{ rand() }}" readonly>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="tanggal_sewa" class="form-label" id="label_pesanan">Tanggal Mulai</label>
                            <input type="date" class="form-control" name="tanggal_sewa" id="tanggal_sewa" required>
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
                            <label for="jumlah_produk2" class="form-label" id="label_pesanan">jumlah</label>
                            <input type="number" class="form-control" name="jumlah_produk" id="jumlah_produk2" min="0" onchange="total2();" required>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="total_harga2" class="form-label" id="label_pesanan">Total Harga</label>
                            <input type="text" class="form-control" name="total_harga" id="total_harga2" readonly>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="alamat" class="form-label" id="label_pesanan">Alamat Lengkap</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" required>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6 mt-2">
                            <button type="submit" class="btn btn-pesan2 form-label">Pesan sekarang</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
