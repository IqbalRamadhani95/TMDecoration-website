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
   <div class="login-section">
    <div class="register-caption">
      <form action="/register" method="post" >
          @csrf
          @method('post')
            <div class="login-judul text-center">
              <h3>Register</h3>
            </div>
            <div class="mb-3">
              <label for="name" style="color:#5D6D7E !important;" class="form-label">Nama</label>
              <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" required value="{{ old('name') }}">
              @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="username" style="color:#5D6D7E !important;" class="form-label">Username</label>
              <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required value="{{ old('username') }}">
              @error('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="email" style="color:#5D6D7E !important;" class="form-label">Email</label>
              <input type="text" class="form-control @error('username_pelanggan') is-invalid @enderror" id="email" name="email" required value="{{ old('email') }}">
              @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password" style="color:#5D6D7E !important;" class="form-label">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required value="{{ old('password') }}">
              @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password_confirmation" style="color:#5D6D7E !important;" class="form-label">Konfirmasi Password</label>
              <input type="password" class="form-control  @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required value="{{ old('password_confirmation') }}">
              @error('password_confirmation')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-login1">Register</button>
      </form>
  </div>  
   </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>