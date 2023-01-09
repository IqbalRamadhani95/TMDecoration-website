@extends('user.base')

@section('konten')
    <div class="container">
        <div class="wrap-detail-produk">
            <div class="detail_produk">
                <div class="row row-cols-1 row-cols-md-2 g-2">
                    <div class="col">
                        <div class="detail_produk_img">
                            <img src="/storage/images/{{ $produk->foto }}" alt=""
                                class="img-responsive detail_produk_img">
                        </div>
                    </div>
                    <div class="col">
                        <div class="deskripsi">
                            <h5 class="text-center">{{ $produk->nama_produk }}</h5>
                            <h6 class="mt-3">Note :</h6>
                            <div>
                                <div class="d-flex">
                                    <p style="font-size: 14px; font-weight:500; margin-left:10px; margin-right:10px;">1.</p>
                                    <p style="font-size: 14px;">Masukkan jumlah produk ketika akan memesan atau memasukan
                                        produk ke Keranjang</p>
                                </div>
                                <div class="d-flex mm-10">
                                    <p style="font-size: 14px; font-weight:500; margin-left:10px; margin-right:10px;">2.</p>
                                    <p style="font-size: 14px;">Pilih jumlah produk dengan cermat, sesuai jenis produk</p>
                                </div>
                                <div class="d-flex mm-10">
                                    <p style="font-size: 14px; font-weight:500; margin-left:10px; margin-right:10px;">3.</p>
                                    <p style="font-size: 14px;">Selain produk paket, maka jumlah dan harga berlaku untuk
                                        setiap satu pcs</p>
                                </div>
                                <div class="d-flex mm-10">
                                    <p style="font-size: 14px; font-weight:500; margin-left:10px; margin-right:10px;">4.</p>
                                    <p style="font-size: 14px;">Upload bukti pembayaran pada menu pesanan setelah melakukan
                                        pemesanan produk</p>
                                </div>
                            </div>
                            <div class="harga mt-3">
                                <h5>Rp. {{ number_format($produk->harga_sewa, 2) }}</h5>
                                <input type="hidden" name="harga" id="harga" value="{{ $produk->harga_sewa }}">
                            </div>
                        </div>

                        @if (Auth::check())
                            <a href="/cekstok/{{ $produk->id }}" class="btn btn-pesan-awal">Pesan Sekarang</a>
                        @else
                            <a href="{{ url('loginUser') }}" class="btn btn-pesan-awal">
                                Pesan Sekarang
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form_deskripsi">
                <h5 class="text-center">Deskripsi Produk</h5><br>
                <p>{{ $produk->deskripsi }}</p>
            </div>
        </div>
    </div>
    {{-- end section konten --}}
@endsection
