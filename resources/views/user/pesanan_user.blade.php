@extends('user.base')

@section('konten')
    <div class="gambar">
        <img src="/images/logo.jpg" alt="" class="img-responsive gambar-navbar">
    </div>

    <div class="container">
        <div class="card-pesanan">
            <div class="judul-section-produk">
                <h4 style="font-weight: 650;">Daftar Pesanan</h4>
            </div>
            @if (session()->has('pesan'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 14px">
                    {{ session('pesan') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            {{-- <h3 class="text-center">Pesanan saya</h3> --}}
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="card-catatan">
                        <h6>Note :</h6>
                        <p>1. Tunggu pesanan di periksa oleh admin</p>
                        <p>2. Setelah status pesanan berubah menjadi belum diproses, lakukan pembayaran dengan klik cek pembayaran</p>
                        <p>3. Lakukan pembayaran sesuai harga yang tertera pada no. rekening yang tersedia</p>
                        <p>4. upload bukti pembayaran pada tombol upload bukti</p>
                        <p>4. Tunggu pembayaran di konfirmasi admin, dan anda akan dihubungi admin</p>
                    </div>
                </div>
                <div class="col-md-9">

                    <div class="card card-detail-pesanan">
                        <div class="card-body table-responsive p-0">
                            <table cellpadding="0" class="table table-bordered">
                                <thead class="text-center" style="font-size: 14px; background-color:#adb5bd;">
                                    <tr>
                                        <th>No.</th>
                                        <th>Produk</th>
                                        <th>Total Harga</th>
                                        <th>Bukti bayar</th>
                                        <th style="width: 25%;">Status Pesanan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 14px;">
                                    @foreach ($pesanan as $ps)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                @foreach ($produkPesanan->where('id_pesanan', $ps->id_pesanan) as $pp)
                                                    <div class="d-flex">
                                                        <img src="{{ asset('storage/images/' . $pp->foto) }}" alt=""
                                                            class="img_pesanan">
                                                        <div style="margin-left:10px">
                                                            <p><b>{{ $pp->nama_produk }}</b> <br>
                                                                Qty : {{ $pp->jml_produk_pesanan }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </td>
                                            <td>
                                                <p>Rp. {{ number_format($ps->total_harga) }}</p>
                                            </td>
                                            <td>
                                                @if ($ps->status == 'Sedang diperiksa' || $ps->status == 'Pesanan gagal')
                                                    <center><b>-</b></center>
                                                @else()
                                                <center>
                                                    <a href="/pembayaran/{{ $ps->id_pesanan }}"
                                                        class="badge bg-success" style="text-decoration:none; color:#fff;"> Cek Pembayaran</a>
                                                </center>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($ps->status == 'Sedang diproses')
                                                    <div class="badge bg-success">{{ $ps->status }}</div>
                                                    <p style="font-size: 13px;margin-top:10px;">Pesanan di proses, anda akan dihubungi
                                                        admin dalam 1
                                                        x 24 jam untuk waktu pemasangan</p>
                                                @elseif($ps->status == 'Belum diproses')
                                                    <div class="badge bg-secondary">{{ $ps->status }}</div>
                                                    <p style="font-size: 13px;margin-top:10px;">Silahkan lakukan pembayaran</p>
                                                @elseif($ps->status == 'Pesanan selesai')
                                                    <div class="badge bg-primary">{{ $ps->status }}</div>
                                                @elseif($ps->status == 'Pesanan gagal')
                                                    <div class="badge bg-danger">{{ $ps->status }}</div>
                                                    <p style="font-size: 13px; margin-top:10px; font-weight:500;">
                                                        Maaf.. produk tidak tersedia pada tanggal yang anda pilih
                                                    </p>
                                                @endif
                                            </td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="badge bg-primary" style="border: none;"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $ps->id_pesanan }}">
                                                    Detail
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{ $ps->id_pesanan }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Detail
                                                                    Pesanan
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <h6>Produk Dipesan</h6>
                                                                        @foreach ($produkPesanan->where('id_pesanan', $ps->id_pesanan) as $pp)
                                                                            <div class="" style="font-size: 13px;">
                                                                                <img src="{{ asset('storage/images/' . $pp->foto) }}"
                                                                                    alt="" style="width: 100%;">
                                                                                <div class="text-center"
                                                                                    style="font-size:13px">
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
                                                                                <td>No. Invoice</td>
                                                                                <td>:</td>
                                                                                <td>{{ $ps->id_invoice }}</td>
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
                                                                                <td>Rp.
                                                                                    {{ number_format($ps->total_harga) }}
                                                                                </td>
                                                                            </tr>
                                                                            @if ($ps->status == 'Sudah bayar')
                                                                                <tr>
                                                                                    <td>Status</td>
                                                                                    <td>:</td>
                                                                                    <td>{{ $ps->status }}</td>
                                                                                </tr>
                                                                            @else()
                                                                                <tr>
                                                                                    <td>Status</td>
                                                                                    <td>:</td>
                                                                                    <td>Belum bayar</td>
                                                                                </tr>
                                                                            @endif
                                                                        </table>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @if ($ps->status == 'Sedang diproses')
                                                    <a href="/cetakStruk/{{ $ps->id_pesanan }}"
                                                        style="text-decoration: none;color:#fff;" target="blank"
                                                        class="badge bg-warning">Cetak struk</a>
                                                @elseif($ps->status == 'Belum diproses')
                                                    <a href="/cetakStruk/{{ $ps->id_pesanan }}"
                                                        style="text-decoration: none;" target="blank"
                                                        class="badge bg-warning">Cetak struk</a>
                                                @endif

                                                @if ($ps->status == 'Pesanan gagal')
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="badge bg-danger" style="border: none;"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal2{{ $ps->id_pesanan }}">
                                                        Batal
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal2{{ $ps->id_pesanan }}"
                                                        tabindex="-1" aria-labelledby="exampleModal2Label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-sm modal-dialog-centered">
                                                            <div class="modal-content bg-warning">
                                                                <form action="/batal-pesanan" method="post">
                                                                    @csrf
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Batalkan Pesanan
                                                                        </h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $ps->id_pesanan }}">
                                                                        <p>Anda yakin ingin membatalkan pesanan?</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-secondary">Ya
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
