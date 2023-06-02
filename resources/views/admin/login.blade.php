<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/app.css') }}">
</head>
<body>
    <div class="wrapper">
        <div class="text-center mb-4">
        </div>
        <form class="form-signin" action="{{ route('admin.login') }}" method="POST">
          @csrf      
          <h2 style="text-align: center;" class="form-signin-heading">Đăng nhập</h2>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
            @error('email')<p style="color: red">{{ $message }}</p>@enderror
          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Mật khẩu">
            @error('password')<p style="color: red">{{ $message }}</p>@enderror
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng nhập</button>   
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>