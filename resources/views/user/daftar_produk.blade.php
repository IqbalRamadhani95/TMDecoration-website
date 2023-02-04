@extends('user.base')

@section('konten')
  <div class="gambar">
    <img src="./images/logo.jpg" alt="" class="img-responsive gambar-navbar">
  </div>

  <!-- section utama produk -->
  <div class="container">
    <div class="card-produk">
      <div class="judul-section-produk">
        <h4 style="font-weight: 700;">Daftar Produk</h4>
      </div>
      <div class="content-produk">
        <div class="row row-cols-1 row-cols-md-4 g-4">
         
            @foreach ($product as $item)
            @if ($item->status_produk == 'tersedia')
            <div class="col">
              <div class="card list-produk h-100">
                <img src="{{ asset('storage/images/' . $item->foto) }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title text-center">{{$item->nama_produk}}</h5>
                  <p class="card-text ct-2 d-flex">
                    Rp.{{number_format($item->harga_sewa) }},-
                    <a href="{{ url('detailProdukAwal') }}/{{ $item->id }}"><button class="btn-produk">Cek detail</button></a>
                  </p>
                </div>
              </div>
            </div> 
            @else
              produk kosong
            @endif
            @endforeach
        </div>
      </div>
      {{-- <div class="row">
        <div class="col-md-3">
            <div class="card card-kategori">
              <div class="card-body">
                <p class="card-title mb-4">Kategori</p>
                <div class='d-flex'>
                  <i class="bi bi-box"></i>
                  <a href="#" class='link-category' name='paket'><p class="card-text category">Paket</p></a>
                  <i class="bi bi-chevron-right ms-auto"></i>
                </div><hr>
                <div class='d-flex'>
                  <i class="bi bi-list"></i>
                  <a href="#" class='link-category' name='nonPaket'><p class="card-text category">Non Paket</p></a>
                  <i class="bi bi-chevron-right ms-auto"></i>
                </div><hr>
              </div>
            </div>
        </div>

        <div class="col-md-9">
          <div class="content-produk">
            <div class="row row-cols-2 row-cols-md-3 g-4">
              @foreach ($produk as $item)
              <div class="col">
                <div class="card h-100">
                  <img src="./storage/images/{{ $item->foto }}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">{{$item->nama_produk}}</h5>
                    <p class="card-text"><i>{{$item->deskripsi}}</i></p>
                    <p class="card-text ct-2 d-flex">
                      Rp.{{ $item->harga_sewa }},-
                      <a href="{{ url('detail_produk') }}/{{ $item->id }}"><button class="btn-produk">Cek detail</button></a>
                    </p>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div> --}}
    </div>
  </div>
  <!-- end section utama produk -->
@endsection