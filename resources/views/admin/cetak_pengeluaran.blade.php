<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengeluaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="form-group">
            <h4 align="center" style="margin-top: 50px;margin-bottom:30px;">Laporan Pengeluaran</h4>
            <table class="table table-striped table-bordered" align="center" style="width: 100%; border:1px solid grey;">
                <tr>
                    <th>No</th>
                    <th>Nama item</th>
                    <th>Jumlah item</th>
                    <th>Tanggah pembelian</th>
                    <th>Harga item</th>
                </tr>
                @php $total = 0; @endphp
                @foreach($pengeluaran as $item)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$item->nama_item}}</td>
                        <td>{{ $item->jumlah_item }}</td>
                        <td>{{ $item->tanggal_beli }}</td>
                        <td>{{ $item->harga_item }}</td>
                    </tr>
                @php $total += $item->harga_item @endphp
                @endforeach
            </table>
    
            <div class="total-pengeluaran" style="float: right; margin-top:20px;">
                <form>
                    <label style="font-weight: 500;">total pengeluaran : </label>
                    <input type="text" value="Rp. {{number_format($total, 2)}}">
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>