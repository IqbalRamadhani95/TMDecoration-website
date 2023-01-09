@extends('admin.base_admin')

@section('konten-admin')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Laporan Pemasukan</h1>
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

        <button type="button" class="btn btn-warning" style="margin-left: 15px; margin-bottom:20px;" data-toggle="modal"
            data-target="#cek_tgl_pemasukan">
            Cari sesuai tanggal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="cek_tgl_pemasukan" tabindex="-1" role="dialog" aria-labelledby="cek_tgl_pemasukanLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cek_tgl_pemasukanLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/pemasukan/periode" method="get">
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
                            <div class="card-body table-responsive">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Produk</th>
                                            <th>tanggal Sewa</th>
                                            <th>tanggal Selesai</th>
                                            <th>Alamat Sewa</th>
                                            <th>harga</th>
                                            <th>aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total2 = 0; @endphp
                                        @foreach ($pemasukan as $item)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td> {{ $item->nama_pelanggan }}</td>
                                                <td>
                                                    @foreach ($produkPesanan->where('id_pesanan', $item->id_pesanan) as $pp)
                                                        <p>{{ $pp->nama_produk }}</p>
                                                    @endforeach
                                                </td>
                                                <td>{{ $item->tanggal_sewa }}</td>
                                                <td>{{ $item->tanggal_selesai }}</td>
                                                <td>{{ $item->alamat_sewa }}</td>
                                                <td>{{ $item->harga }}</td>
                                                <td>

                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#modal-danger{{ $item->id }}">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>

                                                    <div class="modal fade" id="modal-danger{{ $item->id }}">
                                                        <form action="/pemasukan/delete" method="post">
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
                                            @php $total2 += $item->harga; @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="total-pengeluaran" style="float: right; margin-top:20px;">
                                    <form action="">
                                        <label for="">total pemasukan : </label>
                                        <input type="text" value="Rp. {{ number_format($total2) }}">
                                    </form>

                                    <a href="/cetak-pemasukan" target="blank" class="btn btn-success ms-auto"
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
