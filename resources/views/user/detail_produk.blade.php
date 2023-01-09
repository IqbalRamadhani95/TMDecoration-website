@extends('user.base')
    
@section('konten')

  {{-- section konten --}}
  <div class="container">
    <div class="wrap-detail-produk">
      <div class="detail_produk">
        <div class="row row-cols-1 row-cols-md-2 g-2">
            <div class="col">
              <div class="detail_produk_img">
                  <img src="/storage/images/{{ $produk->foto }}" alt="" class="img-responsive detail_produk_img">
              </div>
            </div>
            <div class="col">
              <div class="deskripsi">
                <h5 class="text-center">{{ $produk->nama_produk }}</h5>
                <h6 class="mt-3">Note :</h6>
                <div>
                  <div class="d-flex">
                    <p style="font-size: 14px; font-weight:500; margin-left:10px; margin-right:10px;">1.</p>
                    <p style="font-size: 14px;">Masukkan jumlah produk ketika akan memesan atau memasukan produk ke Keranjang</p>
                  </div>
                  <div class="d-flex mm-10">
                    <p style="font-size: 14px; font-weight:500; margin-left:10px; margin-right:10px;">2.</p>
                    <p style="font-size: 14px;">Pilih jumlah produk dengan cermat, sesuai jenis produk</p>
                  </div>
                  <div class="d-flex mm-10">
                    <p style="font-size: 14px; font-weight:500; margin-left:10px; margin-right:10px;">3.</p>
                    <p style="font-size: 14px;">Selain produk paket, maka jumlah dan harga berlaku untuk setiap satu pcs</p>
                  </div>
                  <div class="d-flex mm-10">
                    <p style="font-size: 14px; font-weight:500; margin-left:10px; margin-right:10px;">4.</p>
                    <p style="font-size: 14px;">Upload bukti pembayaran pada menu pesanan setelah melakukan pemesanan produk</p>
                  </div>
                </div>
                <div class="harga mt-3">
                  <h5>Rp. {{ number_format($produk->harga_sewa, 2) }}</h5>
                  <input type="hidden" name="harga" id="harga" value="{{$produk->harga_sewa}}">
                </div>
              </div>
        
              @if (Auth::check())

              <!-- Button trigger modal -->
              <button type="button" class="btn btn-keranjang" data-bs-toggle="modal" data-bs-target="#tambahCart">
                + List <i class="bi bi-cart3"></i></button>
              </button>

              <!-- Modal -->
              <div class="modal fade" id="tambahCart" tabindex="-1" aria-labelledby="tambahCartLabel" aria-hidden="true">
                <form action="/tambah_keranjang" method="post">
                @csrf
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="tambahCartLabel">Tambah List Pesanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body" style="font-size: 14px; font-weight:500;">
                        <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="{{Auth::user()->id}}">
                        <input type="hidden" name="id_produk" id="id_produk" value="{{$produk->id}}">
                        <div class="form-group">
                          <label for="nama_produk">nama produk</label>
                          <input type="text" class="form-control modal-keranjang"
                              id="nama_produk" name="nama_produk" value="{{$produk->nama_produk}}"
                              placeholder="Nama produk" readonly>
                        </div>
                        <div class="form-group mt-2">
                          <label for="jumlah_produk">Jumlah</label>
                          <input type="number" name="jumlah_produk" id="jumlah_produk" onchange="total();" min="0" placeholder="jumlah" class="form-control modal-keranjang">
                        </div>
                        <div class="form-group mt-2">
                          <label for="total harga">Total Harga</label>
                          <input type="number" name="total_harga" id="total_harga" placeholder="Total harga" class="form-control modal-keranjang" readonly>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-keranjang2">+ List Pesanan <i class="bi bi-cart3"></i></button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>

              <a href="/checkout-direct/{{$produk->id}}" class="btn btn-pesan">Pesan Sekarang</a>
            
              @else
                <a href="{{url('loginUser')}}" class="btn btn-keranjang">
                  + Keranjang <i class="bi bi-cart3"></i>
                </a>
                <a href="{{url('loginUser')}}" class="btn btn-pesan">
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