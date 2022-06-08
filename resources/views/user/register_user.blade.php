<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Home</title>
</head>
<body>
    <!-- hero section -->
        <div class="hero-section">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                  <a class="navbar-brand" href="#">
                    <img src="./images/Tunas-Muda1.png" alt="" class="img-responsive navbar-img">
                  </a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                      <a class="nav-link" aria-current="page" href="/">Beranda</a>
                      <a class="nav-link" href="/produk">Produk</a>
                      <a class="nav-link" href="#">Pesanan</a>
                      <a class="nav-link">Cara pemesanan</a>
                      <a class="nav-link" href="/contact" >Kontak kami</a>
                      <a class="nav-link" href="/login-user" >
                        <button class="btn-login d-flex">
                          <i class="fas fa-sign-in-alt" style="align-self: center; color:#ffff; margin-right: 5px;"></i>
                          Login
                        </button>
                      </a>
                    </div>
                  </div>
                </div>
              </nav>
        </div>  
    <!--end hero section -->

    <!-- <div class="container"> -->
        <div class="login-caption">
            <form action="{{route('register_user')}}" method="post" >
                @csrf
                @method('post')
                  <div class="login-judul text-center">
                    <h2 style="color: #c9981e;;">Selamat Datang</h2>
                  </div>
                  <div class="mb-3">
                    <label for="nama_pelanggan" class="form-label">Nama</label>
                    <input type="text" class="form-control  @error('nama_pelanggan') is-invalid @enderror" id="nama_pelanggan" name="nama_pelanggan" required value="{{ old('nama_pelanggan') }}">
                    @error('nama_pelanggan')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="username_pelanggan" class="form-label">Username</label>
                    <input type="text" class="form-control @error('username_pelanggan') is-invalid @enderror" id="username_pelanggan" name="username_pelanggan" required value="{{ old('username_pelanggan') }}">
                    @error('username_pelanggan')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required value="{{ old('password') }}">
                    @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="konfirmasi_password" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control  @error('konfirmasi_password') is-invalid @enderror" id="konfirmasi_password" name="konfirmasi_password" required value="{{ old('konfirmasi_password') }}">
                    @error('konfirmasi_password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <button type="submit" class="btn-register">Register</button>
            </form>
        </div>  
      <!-- </div>       -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>