<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{$title}}</title>
  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>

<body class="min-vh-100" style="display: flex; flex-direction: column;">
  <header>
    <nav class="navbar  bg-dark navbar-expand-lg px-4 py-3" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="/">Survey<b>CCSM</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('stats') ? 'active' : '' }}" href="/stats">Estadisticas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('edit') ? 'active' : '' }}" href="/edit">Editar</a>
            </li>
          </ul>
    </nav>
    </div>
    </div>
  </header>
  <main class="position-relative container py-5" style="flex-basis:85%">
    {{$slot}}
  </main>
  <footer class="footer mt-auto py-3 bg-light">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <p class="text-muted">&copy; {{ date('Y') }} Brandon Brito </p>
          <small class="text-muted d-block">Entrevista para la Camara de Comercio de Santa Marta</small>
          <img src="/logofooter.png" style="max-width: 80px;" alt="Logo de la Camara de Comercio de Santa Marta">
        </div>
      </div>
    </div>
  </footer>
</body>

</html>