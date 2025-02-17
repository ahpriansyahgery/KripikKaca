<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .login-logo {
            width: 180px;
            margin-bottom: 20px;
        }
        .btn-google {
            background-color: #db4437;
            color: white;
        }
        .btn-google:hover {
            background-color: #c1351d;
        }
    </style>
</head>
<body>

<div class="login-container">
    <img src="{{ asset('user/assets/img/logo.png') }}" alt="Logo" class="login-logo">

    <h5 class="mb-3">Silahkan Login </h5>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    

    <hr>
    <p class="text-center">
      <a class="btn btn btn-outline-primary  btn-google-login" href="{{ route('user.login.google') }}">
          <img src="{{ asset ('user/assets/img/ic_google.svg') }}" class="icon" alt=""> Sign In with Google
      </a>
  </p>

</div>

</body>
</html>
