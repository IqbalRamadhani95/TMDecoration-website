@extends ('user.base')

@section ('konten')
{{-- section konten --}}
<div class="container">
  <div class="judul-section3">
    <h4>Info Profil</h4>
</div>
  <div class="konten-profil">
      <div class="row mt-4">
          <div class="col-md-4">
              <div class="card">
                  <div class="card-body text-center">
                    <img src="./images/profil.jpg" alt="" class="img-profil">
                    <h4 class="card-title">Dashboard akun</h4>
                    <hr>
                    <p class="card-text card-text-profil">{{ Auth::User()->name }}</p>
                    {{-- tambah ke hostinger --}}
                    <p class="card-text-profil2">{{ Auth::User()->alamat }}</p>
                    <a href="/" class="btn btn-profil"><i class="bi bi-skip-backward-fill"></i> Beranda</a>
                  </div>
              </div>
          </div>
          <div class="col-md-8">
              <div class="card card-identitas">
                  <div class="card-body">
                    <h5 class="card-title">Informasi pengguna</h5>
                    <hr>
                    <form action="/profil-user/edit" method="post" enctype="multipart/form-data" class="row">
                        @csrf
                        @method('put')
                        <div class="col-md-6 mt-2">
                          <label for="nama" class="form-label label-profil">Nama Lengkap</label>
                          <input type="text" style="font-size: 14px" class="form-control" id="nama" name="name" value="{{ Auth::User()->name }}">
                        </div>
                        <div class="col-md-6 mt-2">
                          <label for="nomor" class="form-label label-profil">Username</label>
                          <input type="text" style="font-size: 14px" class="form-control" id="nomor" name="username" value="{{ Auth::User()->username }}">
                        </div>
                        <div class="col-md-6 mt-2">
                          <label for="waktu-mulai" class="form-label label-profil">No. Hp</label>
                          <input type="text" style="font-size: 14px" class="form-control" id="waktu-mulai" name="noHp" value="{{ Auth::User()->noHp }}">
                        </div>
                        <div class="col-md-6 mt-2">
                          <label for="waktu-selesai" class="form-label label-profil">Email</label>
                          <input type="text" style="font-size: 14px" class="form-control" id="waktu-selesai" name="email" value="{{ Auth::User()->email }}">
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="alamat" class="form-label label-profil">Alamat Lengkap</label>
                            <input type="text" style="font-size: 14px" class="form-control" id="alamat" name="alamat" value="{{ Auth::User()->alamat }}">
                          </div>
                        <div class="mt-4">
                          <button type="submit" class="btn btn-pesan">Simpan Profil</button>
                        </div>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
{{-- end section konten --}}
@endsection