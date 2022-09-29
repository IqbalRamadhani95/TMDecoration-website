@extends('admin.base_admin')

@section('konten-admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Produk</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">-</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" style="margin-left: 15px; margin-bottom:20px;" data-toggle="modal"
            data-target="#exampleModal">
            Tambah data produk
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/produk-adm/insert" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="gambar">gambar produk</label>
                                    <input type="file" class="form-control" id="gambar" name="gambar"
                                        placeholder="masukkan gambar">
                                </div>
                                <div class="form-group">
                                    <label for="nama">nama produk</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="masukkan nama produk">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                        placeholder="masukkan deskripsi produk">
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" class="form-control" id="jumlah" name="jumlah"
                                        placeholder="masukkan jumlah produk">
                                </div>
                                <div class="form-group">
                                    <label for="harga">Deskripsi</label>
                                    <input type="number" class="form-control" id="harga" name="harga"
                                        placeholder="masukkan harga produk">
                                </div>
                            </div>
                            <!-- /.card-body -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end-modal -->

        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>foto</th>
                                            <th>nama produk</th>
                                            <th>deskripsi</th>
                                            <th>jumlah</th>
                                            <th>harga sewa</th>
                                            <th>aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produk as $item)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td><img src="./storage/images/{{ $item->foto }}" alt=""
                                                        class="img-responsive" style="max-width: 80px;"></td>
                                                <td>{{ $item->nama_produk }}</td>
                                                <td>{{ $item->deskripsi }}</td>
                                                <td>{{ $item->jumlah_produk }}</td>
                                                <td>{{ $item->harga_sewa }}</td>
                                                <td>
                                                    <!--end-modal -->
                                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#dataproduk{{ $item->id }}">
                                                        <i class="far fa-edit"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="dataproduk{{ $item->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="dataprodukLabel"
                                                        aria-hidden="true">
                                                        <form action="/produk-adm/{{ $item->id }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('put')
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="dataprodukLabel">
                                                                            Edit Data
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                                        <div class="card-body">
                                                                            <div class="form-group">
                                                                                <label for="gambar_update">gambar produk</label>
                                                                                <input type="hidden" class="form-control"
                                                                                     name="old_image" value="{{$item->foto}}">
                                                                                @if ($item->foto)
                                                                                    <img src="./storage/images/{{ $item->foto }}" alt="" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                                                                @else 
                                                                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                                                                @endif
                                                                                <input type="file" class="form-control" id="gambar_update" name="gambar_update" onchange="PreviewImageUpdate()">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="nama_produk">nama produk</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="nama_produk" name="nama_produk" value="{{$item->nama_produk}}"
                                                                                    placeholder="masukkan nama produk">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="deskripsi_produk">Deskripsi</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="deskripsi_produk" name="deskripsi_produk" value="{{$item->deskripsi}}"
                                                                                    placeholder="masukkan deskripsi produk">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="jumlah_produk">Jumlah</label>
                                                                                <input type="number" class="form-control"
                                                                                    id="jumlah_produk" name="jumlah_produk" value="{{$item->jumlah_produk}}"
                                                                                    placeholder="masukkan jumlah produk">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="harga_sewa">Deskripsi</label>
                                                                                <input type="number" class="form-control"
                                                                                    id="harga_sewa" name="harga_sewa" value="{{$item->harga_sewa}}"
                                                                                    placeholder="masukkan harga produk">
                                                                            </div>
                                                                        </div>
                                                                        <!-- /.card-body -->

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Tutup</button>
                                                                        <button type="submit" class="btn btn-primary">Simpan
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                        <!--end-modal -->



                                                  <button type="button" class="btn btn-danger" data-toggle="modal"
                                                      data-target="#modal-danger{{ $item->id }}">
                                                      <i class="fas fa-trash-alt"></i>
                                                  </button>

                                                  <div class="modal fade" id="modal-danger{{ $item->id }}">
                                                      <form action="/produk-adm/delete" method="post">
                                                          @csrf
                                                          <input type="hidden" name="id" value="{{ $item->id }}">
                                                          <div class="modal-dialog">
                                                              <div class="modal-content bg-danger">
                                                                  <div class="modal-header">
                                                                      <h4 class="modal-title">Danger Modal</h4>
                                                                      <button type="button" class="close" data-dismiss="modal"
                                                                          aria-label="Close">
                                                                          <span aria-hidden="true">&times;</span>
                                                                      </button>
                                                                  </div>
                                                                  <div class="modal-body">
                                                                      <p>Anda yakin ingin menghapus ?</p>
                                                                  </div>
                                                                  <div class="modal-footer justify-content-between">
                                                                      <button type="button" class="btn btn-outline-light"
                                                                          data-dismiss="modal">Close</button>

                                                                      <button type="submit" class="btn btn-outline-light">Yes</button>
                                                                  </div>
                                                              </div>
                                                              <!-- /.modal-content -->
                                                          </div>
                                                      </form>

                                                      <!-- /.modal-dialog -->
                                                  </div>
                                                  <!-- /.modal -->
                                                </td>
                                            </tr>
                                          @endforeach
                                    </tbody>
                                </table>
                            </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
    </div>
    </div>
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
