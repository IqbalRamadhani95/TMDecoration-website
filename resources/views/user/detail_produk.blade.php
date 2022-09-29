@extends('user.base')
    
@section('konten')

  {{-- section konten --}}
  <div class="container">
    <div class="wrap-detail-produk">
      <div class="detail_produk">
        <div class="row">
            <div class="col-md-6">
              <div class="detail_produk_img">
                  <img src="/storage/images/{{ $produk->foto }}" alt="" class="img-responsive detail_produk_img">
              </div>
            </div>
            <div class="col-md-6">
              <div class="deskripsi">
                <h4>{{ $produk->nama_produk }}</h4>
                <h6 class="mt-3">Deskripsi :</h6>
                <p>{{ $produk->deskripsi }}</p>
                <h6 class="mt-3">Note :</h6>
                <p>Lakukan konfirmasi pembayaran pada menu pesanan setelah melakukan pemesanan produk!</p>
                <div class="harga mt-3">
                  <h5>Rp. {{ number_format($produk->harga_sewa, 2) }}</h5>
                </div>
              </div>

              @if (Auth::check())
              <form action="/tambah_keranjang" method="post">
                @csrf
                <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="{{Auth::user()->id}}">
                <input type="hidden" name="id_produk" id="id_produk" value="{{$produk->id}}">
                <input type="hidden" name="jumlah_produk" id="jumlah_produk" value="1">
                <input type="hidden" name="total_harga" id="total_harga" value="{{$produk->harga_sewa}}">
                <button type="submit" class="btn btn-keranjang">
                  + keranjang
                </button>
              </form>
              @else
                <a href="{{url('loginUser')}}" class="btn btn-keranjang">
                  +keranjang
                </a>
              @endif
            </div>
        </div>
      </div>
 
      <div class="form_pesanan">
        <h5>Form Pemesanan</h5>
        <form class="row" action="" method="post">
          @csrf
          <div class="col-md-6 mt-2">
            <label for="nama" class="form-label" id="label_pesanan">Nama</label>
            <input type="text" class="form-control" id="nama">
          </div>
          <div class="col-md-6 mt-2">
            <label for="nomor" class="form-label" id="label_pesanan">Nomer hp/WA</label>
            <input type="password" class="form-control" id="nomor">
          </div>
          <div class="col-md-12 mt-2">
            <label for="alamat" class="form-label" id="label_pesanan">Alamat</label>
            <input type="text" class="form-control" id="alamat">
          </div>
          <div class="col-md-6 mt-2">
            <label for="waktu-mulai" class="form-label" id="label_pesanan">Waktu mulai sewa</label>
            <input type="date" class="form-control" id="waktu-mulai">
          </div>
          <div class="col-md-6 mt-2">
            <label for="waktu-selesai" class="form-label" id="label_pesanan">Waktu berakhir sewa</label>
            <input type="date" class="form-control" id="waktu-selesai">
          </div>
          <div class="mt-4">
              <button type="submit" class="btn btn-pesan">Pesan sekarang</button>
          </div>
        </form>
      </div>
    </div>    
  </div>
{{-- end section konten --}}

@endsection