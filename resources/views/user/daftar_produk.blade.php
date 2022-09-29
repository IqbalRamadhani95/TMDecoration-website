    @extends('user.base')
    
    <!-- section-navbar -->
    @section('konten')
    <!--end section-navbar -->
    
    <!-- section utama produk -->
    <div class="container">
        <div class="section-produk">
          <div class="produk-2">
            <div class="judul-section2 text-center">
              <h3>Daftar Produk</h3>
            </div>
            <div class="content-produk">
              <div class="row row-cols-2 row-cols-md-4 g-4">
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
    </div>
    <!-- end section utama produk -->
    
    @endsection