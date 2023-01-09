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
            <h4 align="center" style="margin-top: 50px;margin-bottom:30px;">Laporan Pemasukan</h4>
            <table class="table table-striped table-bordered" align="center"
                style="width: 100%; border:1px solid grey;">
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Produk</th>
                    <th>tanggal Sewa</th>
                    <th>tanggal Selesai</th>
                    <th>Alamat Sewa</th>
                    <th>harga</th>
                </tr>
                @php $total = 0; @endphp
                @foreach ($pemasukan as $item)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $item->nama_pelanggan }}</td>
                        <td>
                            @foreach ($produkPesanan->where('id_pesanan', $item->id_pesanan) as $pp)
                                <p>{{ $pp->nama_produk }}</p>
                            @endforeach
                        </td>
                        <td>{{ $item->tanggal_sewa }}</td>
                        <td>{{ $item->tanggal_selesai }}</td>
                        <td>{{ $item->alamat_sewa }}</td>
                        <td>{{ $item->harga }}</td>
                    </tr>
                    @php $total += $item->harga @endphp
                @endforeach
            </table>

            <div class="total-pengeluaran" style="float: right; margin-top:20px;">
                <form>
                    <label style="font-weight: 500;">total pengeluaran : </label>
                    <input type="text" value="Rp. {{ number_format($total, 2) }}">
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
