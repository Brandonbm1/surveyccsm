<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>

<body>
  <style>
    body {
      background-color: #212329;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .login {
      background-color: #fefefe;
      padding: 2rem 3rem;
      border-radius: 1rem;
      box-shadow: 0 0 10px 0 #0008;
      color: #000;
    }
  </style>
  <section class="row gap-4 justify-content-center">
    <div class="login">
      <h3 class="fs-2 fw-bold m-4 text-center">Iniciar Sesión</h3>
      <form method="post" action="{{route('login')}}" class="d-flex flex-column gap-2">
        @csrf
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" autocomplete="false">
          <label for="name">Nombre</label>
        </div>
        <div class="form-floating mb-3">
          <select class="form-select" name="role" id="role">
            <option value="admin">Admin</option>
            <option value="user">User</option>
          </select>
          <label for="role" class="form-label">Rol</label>
        </div>
        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
      </form>
      @if ($errors->any())
      <div class="alert alert-danger mt-2" role="alert">
        @foreach ($errors->all() as $error)
        <p class="m-0">{{$error}}</p>
        @endforeach
      </div>
      @endif
    </div>
  </section>

</body>

</html>