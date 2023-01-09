@extends('admin.base_admin')

@section('konten-admin')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Daftar Pesanan</h1>
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
            data-target="#cek_tgl_pesanan">
            Cari sesuai tanggal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="cek_tgl_pesanan" tabindex="-1" role="dialog" aria-labelledby="cek_tgl_pesananLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cek_tgl_pesananLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/pesanan/periode" method="get">
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

        <button type="button" class="btn btn-success" style="margin-left: 15px; margin-bottom:20px;" data-toggle="modal"
            data-target="#cek_nama_pesanan">
            Cari sesuai nama
        </button>

        <!-- Modal -->
        <div class="modal fade" id="cek_nama_pesanan" tabindex="-1" role="dialog" aria-labelledby="cek_nama_pesananLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cek_nama_pesananLabel">Cari Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/pesanan/cekNama" method="get">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="cek_nama">Dari tanggal</label>
                                    <input type="text" class="form-control" id="cek_nama" name="cek_nama"
                                        placeholder="masukkan nama">
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
                            <div class="card-body table-responsive p-">
                                <table class="table table-hover text-nowrap">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Detail Pesanan</th>
                                            <th>Invoice</th>
                                            <th>Tgl Mulai</th>
                                            <th>Tgl Selesai</th>
                                            <th>Bukti transfer</th>
                                            <th>Status Pesanan</th>
                                            <th>aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($pesanan as $key => $item)
                                            <tr>
                                                <td>{{ $pesanan->firstItem() + $key }}</td>
                                                <td>{{ $item->nama_pelanggan }}</td>
                                                <td>
                                                    <center>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-sm btn-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal1{{ $item->id_pesanan }}">
                                                            Lihat Detail
                                                        </button>
                                                    </center>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal1{{ $item->id_pesanan }}"
                                                        tabindex="-1" aria-labelledby="exampleModal1Label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModal1Label">
                                                                        Detail Pesanan
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <h6>Daftar Produk</h6>
                                                                            @foreach ($produkPesanan->where('id_pesanan', $item->id_pesanan) as $pp)
                                                                                <div class=""
                                                                                    style="font-size: 13px;">
                                                                                    <img src="{{ asset('storage/images/' . $pp->foto) }}"
                                                                                        alt=""
                                                                                        style="width: 100%;">
                                                                                    <div class="text-center"
                                                                                        style="font-size:13px">
                                                                                        <h6>{{ $pp->nama_produk }}</h6>
                                                                                        <p>Qty :{{ $pp->jml_produk }}
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <h6>Rincian</h6>
                                                                            <p>Nama Pelanggan : {{ $item->nama_pelanggan }}
                                                                            </p>
                                                                            <p>Alamat : {{ $item->alamat_pelanggan }}</p>
                                                                            <p>Tanggal Mulai : {{ $item->tanggal_sewa }}</p>
                                                                            <p>Tanggal Selesai :
                                                                                {{ $item->tanggal_selesai }}</p>
                                                                            <p>Total harga : {{ $item->total_harga }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $item->id_invoice }}</td>
                                                <td>{{ $item->tanggal_sewa }}</td>
                                                <td>{{ $item->tanggal_selesai }}</td>
                                                <td>
                                                    @if (empty($item->bukti_transfer))
                                                        <center><b>-</b></center>
                                                    @elseif($item->status_bayar == '1')
                                                        <center><button class="btn btn-sm btn-success">Sudah Dikonfirmasi</button></center>
                                                    @else
                                                        <center>
                                                            <button type="button" class="btn btn-sm btn-primary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal2{{ $item->id_pesanan }}">
                                                                Cek
                                                            </button>
                                                        </center>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal2{{ $item->id_pesanan }}"
                                                            tabindex="-1" aria-labelledby="exampleModal2Label"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <form action="/statusBayar" method="post">
                                                                        @csrf
                                                                        @method('put')
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModal2Label">
                                                                                Konfirmasi Pembayaran
                                                                            </h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close">
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <p class="text-center">Bukti Pembayaran</p>
                                                                                    <center>
                                                                                        <img src="{{ asset('storage/images/' . $item->bukti_transfer) }}"
                                                                                        alt=""
                                                                                        class="img-responsive"
                                                                                        style="width:70%;">
                                                                                    </center> 
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <p class="text-center">Konfirmasi</p>
                                                                                    <input type="hidden"
                                                                                        name="id_pesanan"
                                                                                        value="{{ $item->id_pesanan }}">
                                                                                    <div class="form-check">
                                                                                        <input class="form-check-input"
                                                                                            type="radio"
                                                                                            name="status_bayar"
                                                                                            id="exampleRadios1"
                                                                                            value="1">
                                                                                        <label class="form-check-label"
                                                                                            for="exampleRadios1">
                                                                                            Konfirmasi
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="form-check">
                                                                                        <input class="form-check-input"
                                                                                            type="radio"
                                                                                            name="status_bayar"
                                                                                            id="exampleRadios2"
                                                                                            value="2">
                                                                                        <label class="form-check-label"
                                                                                            for="exampleRadios2">
                                                                                            Tidak valid, Upload Ulang
                                                                                            Bukti
                                                                                            bayar
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-success"
                                                                                data-bs-dismiss="modal">Simpan
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <form action="/ubah-status" method="post">
                                                        @csrf
                                                        @method('put')
                                                        <input type="hidden" name="id_pesanan"
                                                            value="{{ $item->id_pesanan }}">
                                                        <select name="status_pesanan" id=""
                                                            onchange="this.form.submit()">
                                                            <option value="Belum diproses"
                                                                @if ($item->status == 'Belum diproses') selected @endif>
                                                                Belum diproses
                                                            </option>
                                                            <option value="Sedang diproses"
                                                                @if ($item->status == 'Sedang diproses') selected @endif>
                                                                Sedang diproses
                                                            </option>
                                                            <option value="Pesanan selesai"
                                                                @if ($item->status == 'Pesanan selesai') selected @endif>
                                                                Pesanan selesai
                                                            </option>
                                                            <option value="Pesanan gagal"
                                                                @if ($item->status == 'Pesanan gagal') selected @endif>
                                                                Pesanan gagal
                                                            </option>
                                                        </select>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="/tambah-pemasukan" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id_pesanan"
                                                            value="{{ $item->id_pesanan }}">
                                                        <input type="hidden" name="nama_pelanggan"
                                                            value="{{ $item->nama_pelanggan }}">
                                                        <input type="hidden" name="tanggal_sewa"
                                                            value="{{ $item->tanggal_sewa }}">
                                                        <input type="hidden" name="tanggal_selesai"
                                                            value="{{ $item->tanggal_selesai }}">
                                                        <input type="hidden" name="alamat_sewa"
                                                            value="{{ $item->alamat_pelanggan }}">
                                                        <input type="hidden" name="harga"
                                                            value="{{ $item->total_harga }}">
                                                        <button type="submit" class="btn btn-sm btn-info"
                                                            style="width: 100%">
                                                            + laporan
                                                        </button>
                                                    </form>


                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-toggle="modal"
                                                        data-target="#modal-danger{{ $item->id_pesanan }}"
                                                        style="margin-top:10px; width:100%;">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>

                                                    <div class="modal fade" id="modal-danger{{ $item->id_pesanan }}">
                                                        <form action="/pesanan/delete" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id_pesanan"
                                                                value="{{ $item->id_pesanan }}">
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
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="page">
                                    {{ $pesanan->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section><!-- /.content -->
    </div>
@endsection
