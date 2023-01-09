<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pemasukan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="form-group">
            <h4 align="center" style="margin-top: 50px;margin-bottom:30px;">Tunas Muda Decoartion</h4>
            <h6>Rincian</h6>
            <table cellpadding="5">
                <tr>
                    <td>Produk Dipesan</td>
                    <td>:</td>
                    <td>
                        @foreach ($produkPesanan->where('id_pesanan', $pesanan->id_pesanan) as $pp)
                        {{ $pp->nama_produk }}
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>Nama Pelanggan </td>
                    <td>:</td>
                    <td>{{ $pesanan->nama_pelanggan }}</td>
                </tr>
                <tr>
                    <td>No. Invoice</td>
                    <td>:</td>
                    <td>{{ $pesanan->id_invoice }}</td>
                </tr>
                <tr>
                    <td>Alamat Lokasi</td>
                    <td>:</td>
                    <td>{{ $pesanan->alamat_pelanggan }}</td>
                </tr>
                <tr>
                    <td>Tanggal Mulai Sewa</td>
                    <td>:</td>
                    <td>{{ $pesanan->tanggal_sewa }}</td>
                </tr>
                <tr>
                    <td>Tanggal Selesai Sewa</td>
                    <td>:</td>
                    <td>{{ $pesanan->tanggal_selesai }}</td>
                </tr>
                <tr>
                    <td>Total Harga</td>
                    <td>:</td>
                    <td>Rp.
                        {{ number_format($pesanan->total_harga) }}
                    </td>
                </tr>
                <tr>
                    <td>No. Rek Pembayaran</td>
                    <td>:</td>
                    <td>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Bank BRI 5541099872167 a.n Cindy</li>
                            <li class="list-group-item">Bank BNI 9887251997882 a.n Shinta</li>
                        </ul>
                    </td>
                </tr>
                @if ($pesanan->status_bayar == '1')
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>Sudah bayar</td>
                    </tr>
                @else()
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>Belum bayar</td>
                    </tr>
                @endif
            </table>
            <h4 align="center" style="margin-top: 50px;margin-bottom:30px;">Terima Kasih</h4>
        </div>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
