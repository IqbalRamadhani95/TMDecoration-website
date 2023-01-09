<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Home</title>
</head>

<body>
   
  <div class="login-section"> 
    <!-- <div class="container"> -->
      <div class="login-caption">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="/loginUser" method="post">
            @csrf
            <div class="login-judul text-center">
                <h3>Login</h3>
            </div>
            <div class="mb-3">
                <label for="username" style="color:#5D6D7E !important;" class="form-label @error('username') is-invalid @enderror">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required>
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" style="color:#5D6D7E !important;" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-login1 mb-4">Login</button>
        </form>
        <div>
            <div class="row row-cols-md-2 g-3">
                <div class="col">
                    <a href="/forgot-password" class="btn btn-lupaPassword">Lupa password ?</a>
                </div>
                <div class="col">
                    <a href="/register" class="btn btn-register">
                        Register
                    </a>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="/" style="text-decoration: none; color: #5D6D7E;">
                    <i class="fa-solid fa-backward-fast"></i>
                    Kembali
                </a>
            </div>
        </div>
    </div>
    <!-- </div>       -->
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
