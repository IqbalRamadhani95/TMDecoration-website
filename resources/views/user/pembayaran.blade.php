@extends('user.base')

@section('konten')
    <div class="gambar">
        <img src="/images/logo.jpg" alt="" class="img-responsive gambar-navbar">
    </div>

    <div class="container mb-5">
        <div class="card-bayar">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header alert alert-warning text-center">
                            <b>Produk Di pesan</b>
                        </div>
                        <div class="card-body">
                            @foreach ($produkPesanan->where('id_pesanan', $pesanan->id_pesanan) as $pp)
                                <div class="" style="font-size: 13px;">
                                    <center><img src="{{ asset('storage/images/' . $pp->foto) }}" alt=""
                                            style="width: 80%;">
                                    </center>
                                    <div class="text-center" style="font-size:13px">
                                        <p><b>{{ $pp->nama_produk }}</b><br>
                                            Qty
                                            :{{ $pp->jml_produk_pesanan }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" style="height: 320px;">
                        <div class="card-header alert alert-success text-center">
                            <b>Rincian Pesanan</b>
                        </div>
                        <div class="card-body">
                            <table cellpadding="5">
                                {{-- @foreach ($pesanan as $ps) --}}
                                <tr>
                                    <td>Nama Pelanggan </td>
                                    <td>:</td>
                                    <td>{{ $pesanan->nama_pelanggan }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>No. Invoice</td>
                                    <td>:</td>
                                    <td>{{ $pesanan->id_invoice }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat Lokasi</td>
                                    <td>:</td>
                                    <td>{{ $pesanan->alamat_pelanggan }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal Mulai Sewa</td>
                                    <td>:</td>
                                    <td>{{date('d F Y', strtotime($pesanan->tanggal_sewa))}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal Selesai Sewa</td>
                                    <td>:</td>
                                    <td>{{ date('d F Y', strtotime($pesanan->tanggal_selesai)) }}
                                    </td>
                                </tr>
                                <tr class="text-success">
                                    <td>Total Harga</td>
                                    <td>:</td>
                                    <td><button class="btn btn-sm btn-success">
                                            Rp.
                                            {{ number_format($pesanan->total_harga) }}
                                    </td>
                                    </button>
                                </tr>
                                {{-- @endforeach --}}
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="height: 320px;">
                        <div class="card-header alert alert-primary text-center">
                            <b>Informasi Pembayaran</b>
                        </div>
                        <div class="card-body">
                            <center>
                                <p class="text-primary">Silahkan Lakukan
                                    Pembayaran
                                    Melalui No. Rekening Dibawah :</p>
                            </center>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Bank BRI
                                    5541099872167 a.n Cindy</li>
                                <li class="list-group-item">Bank BNI
                                    9887251997882 a.n Shinta
                                </li>
                                <li class="list-group-item"></li>
                            </ul>
                            @if (empty($pesanan->bukti_transfer))
                                <button class="btn btn-sm btn-danger" style="width:100%;" data-bs-toggle="modal"
                                    data-bs-target="#buktiTransfer{{ $pesanan->id_pesanan }}">
                                    Upload Bukti Pembayaran
                                </button>

                                <div class="modal fade" id="buktiTransfer{{ $pesanan->id_pesanan }}" tabindex="-1"
                                    aria-labelledby="buktiTransferLabel" aria-hidden="true">
                                    <form action="/bukti-tf" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="id_pesanan" value="{{ $pesanan->id_pesanan }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="buktiTransferLabel">
                                                        Upload
                                                        Bukti
                                                        Transfer
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body" style="font-size: 14px; font-weight:500;">
                                                    <div class="form-group">
                                                        <label for="bukti_transfer">Bukti
                                                            Transfer</label>
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
                            @elseif($pesanan->status_bayar == '0')
                                <button class="btn btn-sm btn-warning" style="width: 100%;"><i class="bi bi-alarm">
                                    </i> Menunggu Konfirmasi
                                </button>
                            @elseif($pesanan->status_bayar == '1')
                                <button class="btn btn-sm btn-success" style="width: 100%;">
                                    <i class="bi bi-check-circle"></i> Pembayaran Berhasil
                                </button>
                            @elseif($pesanan->status_bayar == '2')
                                <button class="btn btn-sm btn-danger" style="width:100%;" data-bs-toggle="modal"
                                    data-bs-target="#buktiTransfer{{ $pesanan->id_pesanan }}">
                                    <i class="bi bi-arrow-repeat"></i> Upload Ulang Bukti Bayar
                                </button>

                                <div class="modal fade" id="buktiTransfer{{ $pesanan->id_pesanan }}" tabindex="-1"
                                    aria-labelledby="buktiTransferLabel" aria-hidden="true">
                                    <form action="/bukti-tf" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="id_pesanan" value="{{ $pesanan->id_pesanan }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="buktiTransferLabel">
                                                        Upload
                                                        Bukti
                                                        Transfer
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body" style="font-size: 14px; font-weight:500;">
                                                    <div class="form-group">
                                                        <label for="bukti_transfer">Bukti
                                                            Transfer</label>
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
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
