@extends('admin.base_admin')

@section('konten-admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      @if(Session::has('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>{{ session::get('error') }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
      <div class="text-center">
       <h4>Selamat Datang {{ Auth::guard('admin')->user()->name }}</h4>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Tunas Muda Decoration</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>{{$pesanan}}</h3>
                <p>Pesanan</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
                <i class="bi bi-bag-check"></i>
              </div>
              <a href="/daftar-pesanan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $produk }}</h3>
                <p>Produk</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="/produk-adm" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $pelanggan }}</h3>
                <p>Pelanggan</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/users-adm" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{ $admin }}</h3>
                <p>Admin</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="/data-admin" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <div class="row">
          <div class="col-lg-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Rp. {{number_format($pemasukan)}}</h3>
                <h4>Total Pemasukan</h4>
              </div>
              <div class="icon">
                <i class="fas fa-dollar-sign"></i>
                <i class="bi bi-bag-check"></i>
              </div>
              <a href="/pemasukan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Rp. {{number_format($pengeluaran)}}</h3>
                <h4>Total Pengeluaran</h4>
              </div>
              <div class="icon">
                <i class="fas fa-dollar-sign"></i>
                <i class="bi bi-bag-check"></i>
              </div>
              <a href="/pengeluaran" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
