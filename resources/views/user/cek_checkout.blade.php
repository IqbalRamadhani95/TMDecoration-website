@extends('user.base')

@section('konten')
    <div class="gambar">
        <img src="/images/logo.jpg" alt="" class="img-responsive gambar-navbar">
    </div>

    <div class="container">
        <div class="card-produk">
            <div class="judul-section-produk">
                <h4 style="font-weight: 700;">Cek Ketersediaan Produk</h4>
            </div>

            <div class="row g-5">
                <div class="col-md-4">
                    <p class="text-center" style="font-size: 16px; font-weight:500;">Produk Dipesan</p>
                    <div class="produk_dipesan">
                        <img src="{{ asset('storage/images/' . $produk->foto) }}" alt="" class="img_checkout2">
                        <p class="text-center" style="margin-top: 10px; font-size:14px; font-weight:500; color:#c9981e;">
                            {{ $produk->nama_produk }}</p>
                    </div>
                </div>

                <div class="col-md-8">
                    <p class="text-center" style="font-size: 16px; font-weight:500;">Sesuaikan Tanggal</p>
                    <form class="row form-checkout" action="/cekproduk" method="get">
                        @csrf
                        <input type="hidden" name="id" value="{{ $produk->id }}">
                        <div class="col-md-6 mt-2">
                            <label for="tanggal_sewa" class="form-label" id="label_pesanan">Tanggal Mulai</label>
                            <input type="date" class="form-control" name="tanggal_sewa" id="tanggal_sewa" required>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="tanggal_selesai" class="form-label" id="label_pesanan">Tanggal Selesai</label>
                            <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai"
                                onchange="cek()" required>
                        </div>
                        @if (isset($_GET['submit']))
                            @if ($pp->isEmpty())
                                <div class="col-md-12 mt-4 mb-3">
                                    <a href="/detail_produk/{{ $produk->id }}" class="btn btn-success"
                                        style="width: 100%;border-radius:10px;font-weight:500;font-size:14px;">Produk
                                        tersedia, silahkan pesan</a>
                                </div>
                            @else
                                <div class="col-md-12 mt-4 mb-3">
                                    <a href="#" class="btn btn-danger"
                                        style="width: 100%;border-radius:10px;font-weight:500;font-size:14px;">Maaf..
                                        Produk tidak tersedia pada tanggal tersebut
                                    </a>
                                </div>
                            @endif
                        @else
                            <div class="col-md-12 mt-3 mb-3">
                                <input type="submit" name="submit" class="btn btn-pesan2 form-label" value="Cek Ketersediaan">
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
