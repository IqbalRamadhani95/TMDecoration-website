@extends('user.base')

@section('konten')
    <div class="container">
        <div class="section-produk">
            <div class="produk-2">
                <div class="judul-section2 text-center">
                    <h3>Daftar Pesanan</h3>
                </div>
                <div class="row">
                    <div class="col-md-4 text-center">
                        <a href="#">
                            <div class="bayar text-center">
                                <i class="bi bi-coin"></i>
                            </div>
                        </a>
                        <p>Belum bayar</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <a href="#">
                            <div class="bayar text-center">
                                <i class="bi bi-hourglass-split"></i>
                            </div>
                        </a>
                        <p>Sedang di proses</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <a href="#">
                            <div class="bayar text-center">
                                <i class="bi bi-check-circle"></i>
                            </div>
                        </a>
                        <p>Selesai</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section utama produk -->

    {{-- backup --}}
    {{-- <div class="row">
                                <div class="col-md-2 text-center">
                                    <h6>Produk</h6>
                                    @foreach ($produkPesanan->where('id_pesanan', $ps->id_pesanan) as $pp)
                                        <img src="{{ asset('storage/images/' . $pp->foto) }}" alt=""
                                            class="img_pesanan">
                                        <p>{{ $pp->nama_produk }}
                                            <br>
                                            Qty : {{ $pp->jml_produk_pesanan }}
                                        </p>
                                    @endforeach
                                </div>
                                <div class="col-md-2 text-center">
                                    <h6>Invoice</h6>
                                    <p>{{ $ps->id_invoice }}</p>
                                </div>
                                <div class="col-md-2 text-center">
                                    <h6>Total Harga</h6>
                                    <p>Rp. {{ number_format($ps->total_harga) }}</p>
                                </div>
                                <div class="col-md-2 text-center">
                                    <h6>Bukti Transfer</h6>
                                    @if ($ps->status == 'Tunggu konfirmasi')
                                        <button class="badge bg-primary" style="border: none;" data-bs-toggle="modal"
                                            data-bs-target="#buktiTransfer{{ $ps->id_pesanan }}" hidden>
                                            Upload
                                        </button>
                                    @elseif($ps->status == 'Pesanan gagal')
                                    @else
                                        <button class="badge bg-primary" style="border: none;" data-bs-toggle="modal"
                                            data-bs-target="#buktiTransfer{{ $ps->id_pesanan }}">
                                            Upload
                                        </button>
                                        <div style="margin-top: 5px">
                                            <img src="{{ asset('storage/images/' . $ps->bukti_transfer) }}" alt=""
                                                class="img-fluid" width="100%">
                                        </div>
                                    @endif

                                    <div class="modal fade" id="buktiTransfer{{ $ps->id_pesanan }}" tabindex="-1"
                                        aria-labelledby="buktiTransferLabel" aria-hidden="true">
                                        <form action="/bukti-tf" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="id_pesanan" value="{{ $ps->id_pesanan }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="buktiTransferLabel">Upload Bukti
                                                            Transfer</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body" style="font-size: 14px; font-weight:500;">
                                                        <div class="form-group">
                                                            <label for="bukti_transfer">Bukti Transfer</label>
                                                            <input type="file" class="form-control" id="bukti_transfer"
                                                                name="bukti_transfer" placeholder="masukkan gambar">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-keranjang2">Upload</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-2 text-center">
                                    <h6>Status</h6>
                                    @if ($ps->status == 'Sudah bayar')
                                        <div class="badge bg-success">{{ $ps->status }}</div>
                                        <p style="font-size: 13px; font-weight:500;">Anda akan dihubungi oleh admin dalam 1
                                            x 24 jam untuk waktu pemasangan</p>
                                    @elseif($ps->status == 'Belum bayar')
                                        <div class="badge bg-secondary">{{ $ps->status }}</div>
                                        <p style="font-size: 13px; font-weight:500;">No. rek pembayaran : 55410998721</p>
                                        <p style="font-size: 13px; font-weight:500;">BANK BRI a.n Cindy</p>
                                    @elseif($ps->status == 'Tunggu konfirmasi')
                                        <div class="badge bg-warning">{{ $ps->status }}</div>
                                    @elseif($ps->status == 'Pesanan gagal')
                                        <div class="badge bg-danger">{{ $ps->status }}</div>
                                        <p style="font-size: 13px; font-weight:500;">Maaf.. produk yang anda pesan sedang
                                            tidak tersedia</p>
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    <h6 class="text-center">Aksi</h6>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="badge bg-primary" style="border: none; margin-left:20px;"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal{{ $ps->id }}">
                                        Detail
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $ps->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <h6>Produk Dipesan</h6>
                                                            @foreach ($produkPesanan->where('id_pesanan', $ps->id_pesanan) as $pp)
                                                                <div class="" style="font-size: 13px;">
                                                                    <img src="{{ asset('storage/images/' . $pp->foto) }}"
                                                                        alt="" style="width: 100%;">
                                                                    <div class="text-center" style="font-size:13px">
                                                                        <h6>{{ $pp->nama_produk }}</h6>
                                                                        <p>Qty :{{ $pp->jml_produk_pesanan }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h6>Rincian</h6>
                                                            <table cellpadding="5">
                                                                <tr>
                                                                    <td>Nama Pelanggan </td>
                                                                    <td>:</td>
                                                                    <td>{{ $ps->nama_pelanggan }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Alamat Lokasi</td>
                                                                    <td>:</td>
                                                                    <td>{{ $ps->alamat_pelanggan }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tanggal Mulai Sewa</td>
                                                                    <td>:</td>
                                                                    <td>{{ $ps->tanggal_sewa }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tanggal Selesai Sewa</td>
                                                                    <td>:</td>
                                                                    <td>{{ $ps->tanggal_selesai }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total Harga</td>
                                                                    <td>:</td>
                                                                    <td>{{ $ps->total_harga }}</td>
                                                                </tr>
                                                            </table>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save
                                                        changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    @if ($ps->status == 'Tunggu konfirmasi')
                                        <form action="/batal-pesanan" method="post">
                                            @csrf
                                        
                                        </form>
                                        <a href="#" class="badge bg-danger"
                                            style="text-decoration: none;">Batal</a>
                                    @else
                                    @endif
                                </div>
                            </div> --}}
@endsection