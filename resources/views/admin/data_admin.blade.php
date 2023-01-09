@extends('admin.base_admin')

@section('konten-admin')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Admin</h1>
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
    
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" style="margin-left: 15px; margin-bottom:20px;" data-toggle="modal"
        data-target="#exampleModal">
        Tambah data Admin
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/data-admin/insert" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="masukkan name">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="masukkan username">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="masukkan email">
                            </div>
                            <div class="form-group">
                                <label for="password">password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="masukkan password">
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

    <button type="button" class="btn btn-success" style="margin-left: 15px; margin-bottom:20px;"
            data-toggle="modal" data-target="#cek_nama_admin">
            Cari sesuai nama
        </button>

        <!-- Modal -->
        <div class="modal fade" id="cek_nama_admin" tabindex="-1" role="dialog"
            aria-labelledby="cek_nama_adminLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cek_nama_adminLabel">Cari Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/data-admin/cariNama" method="get">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Masukkan nama</label>
                                    <input type="text" class="form-control" id="name" name="name"
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
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive p-">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admin as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->username }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                <!--end-modal -->
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#dataadmin{{ $item->id }}">
                                                    <i class="far fa-edit"></i>
                                                </button>
    
                                                <!-- Modal -->
                                                <div class="modal fade" id="dataadmin{{ $item->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="dataadminLabel"
                                                    aria-hidden="true">
                                                    <form action="/data-admin/{{$item->id}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="dataadminLabel">
                                                                        Edit Data
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                                    <div class="card-body">
                                                                        <div class="form-group">
                                                                            <label for="name">nama</label>
                                                                            <input type="text" class="form-control"
                                                                                id="name" name="name" value="{{$item->name}}"
                                                                                placeholder="masukkan nama">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="username">username</label>
                                                                            <input type="text" class="form-control"
                                                                                id="username" name="username" value="{{$item->username}}"
                                                                                placeholder="masukkan username">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="email">Email</label>
                                                                            <input type="text" class="form-control"
                                                                                id="email" name="email" value="{{$item->email}}"
                                                                                placeholder="masukkan email">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="password">password</label>
                                                                            <input type="password" class="form-control"
                                                                                id="password" name="password" value="{{$item->password}}"
                                                                                placeholder="masukkan password">
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.card-body -->
    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Tutup</button>
                                                                    <button type="submit" class="btn btn-primary">Simpan
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div><!--end-modal -->
                                                    
    
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                  data-target="#modal-danger{{ $item->id }}">
                                                  <i class="fas fa-trash-alt"></i>
                                                </button>
    
                                                <div class="modal fade" id="modal-danger{{ $item->id }}">
                                                    <form action="/data-admin/delete" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content bg-danger">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Danger Modal</h4>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Anda yakin ingin menghapus ?</p>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-outline-light"
                                                                        data-dismiss="modal">Close</button>
    
                                                                    <button type="submit" class="btn btn-outline-light">Yes</button>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection