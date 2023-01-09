@extends('admin.base_admin')

@section('konten-admin')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Laporan Pengeluaran</h1>
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
            data-target="#pengeluaranModal">
            Tambah data pengeluaran
        </button>

        <!-- Modal -->
        <div class="modal fade" id="pengeluaranModal" tabindex="-1" role="dialog" aria-labelledby="pengeluaranModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pengeluaranModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/pengeluaran/insert" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_item">nama item</label>
                                    <input type="text" class="form-control" id="nama_item" name="nama_item"
                                        placeholder="masukkan nama produk">
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_item">Jumlah</label>
                                    <input type="number" class="form-control" id="jumlah_item" name="jumlah_item"
                                        placeholder="masukkan jumlah produk">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_beli">Tanggal beli</label>
                                    <input type="date" class="form-control" id="tanggal_beli" name="tanggal_beli"
                                        placeholder="masukkan tanggal beli produk">
                                </div>
                                <div class="form-group">
                                    <label for="harga_item">Harga item</label>
                                    <input type="number" class="form-control" id="harga_item" name="harga_item"
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

        <button type="button" class="btn btn-warning" style="margin-left: 15px; margin-bottom:20px;" data-toggle="modal"
            data-target="#cek_tgl_pengeluaran">
            Cari sesuai tanggal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="cek_tgl_pengeluaran" tabindex="-1" role="dialog" aria-labelledby="cek_tgl_pengeluaranLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cek_tgl_pengeluaranLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/pengeluaran/periode" method="get">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tanggal_mulai">Dari tanggal</label>
                                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai"
                                        placeholder="masukkan tanggal">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_selesai">Sampai tanggal</label>
                                    <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai"
                                        placeholder="masukkan tanggal">
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

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-2">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>nama item</th>
                                            <th>jumlah</th>
                                            <th>tanggal pembelian</th>
                                            <th>harga</th>
                                            <th>aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total = 0; @endphp
                                        @foreach ($pengeluaran as $item)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $item->nama_item }}</td>
                                                <td>{{ $item->jumlah_item }}</td>
                                                <td>{{ date('d F Y', strtotime($item->tanggal_beli))}}</td>
                                                <td>{{ $item->harga_item }}</td>
                                                <td>
                                                    <!--end-modal -->
                                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#pengeluaran{{ $item->id }}">
                                                        <i class="far fa-edit"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="pengeluaran{{ $item->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="pengeluaranLabel"
                                                        aria-hidden="true">
                                                        <form action="/pengeluaran/{{ $item->id }}" method="post"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('put')
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="pengeluaranLabel">
                                                                            Edit Data
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $item->id }}">
                                                                        <div class="card-body">
                                                                            <div class="form-group">
                                                                                <label for="nama_item">nama item</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="nama_item" name="nama_item"
                                                                                    value="{{ $item->nama_item }}"
                                                                                    placeholder="masukkan nama produk">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="jumlah_item">jumlah
                                                                                    item</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="jumlah_item" name="jumlah_item"
                                                                                    placeholder="masukkan deskripsi produk"
                                                                                    value="{{ $item->jumlah_item }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="tanggal_beli">Tanggal
                                                                                    pembelian</label>
                                                                                <input type="date" class="form-control"
                                                                                    id="tanggal_beli" name="tanggal_beli"
                                                                                    value="{{ $item->tanggal_beli }}"
                                                                                    placeholder="masukkan jumlah produk">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="harga_item">Harga item</label>
                                                                                <input type="number" class="form-control"
                                                                                    id="harga_item" name="harga_item"
                                                                                    value="{{ $item->harga_item }}"
                                                                                    placeholder="masukkan harga produk">
                                                                            </div>
                                                                        </div>
                                                                        <!-- /.card-body -->

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Tutup</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Simpan
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
                                                        <form action="/pengeluaran/delete" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id"
                                                                value="{{ $item->id }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content bg-danger">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Danger Modal</h4>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Anda yakin ingin menghapus ?</p>
                                                                    </div>
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button"
                                                                            class="btn btn-outline-light"
                                                                            data-dismiss="modal">Close</button>

                                                                        <button type="submit"
                                                                            class="btn btn-outline-light">Yes</button>
                                                                    </div>
                                                                </div><!-- /.modal-content -->
                                                            </div>
                                                        </form><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
                                                </td>
                                            </tr>
                                            @php $total += $item->harga_item; @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="total-pengeluaran" style="float: right; margin-top:20px;">
                                    <form action="">
                                        <label>total pengeluaran : </label>
                                        <input type="text" value="Rp. {{ number_format($total, 2) }}">
                                    </form>

                                    <a href="/cetak-pengeluaran" target="blank" class="btn btn-success ms-auto"
                                        style="margin-top: 10px; width:100%;">
                                        Cetak pdf
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /.content -->
    </div>
@endsection
