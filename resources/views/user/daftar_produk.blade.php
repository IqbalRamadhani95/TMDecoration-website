    @extends('user.base')
    
    <!-- section-navbar -->
    @section('konten')
    <!--end section-navbar -->
    
    <!-- section utama produk -->
    <div class="container">
        <div class="section-produk">
          <div class="produk-2">
            <div class="judul-section2 text-center">
              <h2>Daftar Produk</h2>
            </div>
            <div class="content-produk">
                <div class="row row-cols-1 row-cols-md-4 g-4">
                  @foreach ($produk as $item)
                  <div class="col">
                    <div class="card h-100">
                      <img src="./storage/images/{{ $item->foto }}" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">{{$item->nama_produk}}</h5>
                        <p class="card-text"><i>{{$item->deskripsi}}</i></p>
                        <p class="card-text ct-2">
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
      </div>
    </div>
    <!-- end section utama produk -->
    
    @endsection