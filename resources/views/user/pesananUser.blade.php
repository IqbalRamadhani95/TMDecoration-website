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
@endsection