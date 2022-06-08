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
            @if(session()->has('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            @if(session()->has('loginError'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            
            <form action="/login-user" method="post">
              @csrf
              <div class="login-judul text-center">
                <h2 style="color: #c9981e;;">Selamat Datang</h2>
              </div>
              <div class="mb-3">
                <label for="username_pelanggan" class="form-label @error('username_pelanggan') is-invalid @enderror">Username</label>
                <input type="text" class="form-control" id="username_pelanggan" name="username_pelanggan" required value="{{ old('username_pelanggan') }}">
                @error('username_pelanggan')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <button type="submit" class="btn-register mb-5">Login</button>
            </form>
            <div>
                <div class="row">
                    <div class="col-md-7">
                        <p style="padding-left: 5px">Belum punya akun? klik register untuk daftar</p>
                    </div>
                    <div class="col-md-5">
                        <a href="/register">
                            <button type="submit" class="btn-register">
                                Register
                            </button>
                        </a>
                    </div>
                </div>
                <div class="text-center back" style="border-bottom: 1px solid #ffff; margin: 0 35%">
                    <a href="/" style="text-decoration: none; color:#ffff;">
                        <i class="fa-solid fa-backward-fast"></i>
                        Kembali
                    </a>
                </div>
          </div>
        </div>  
      <!-- </div>       -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>