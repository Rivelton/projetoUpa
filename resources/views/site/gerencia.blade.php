<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Título da página</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="d-flex flex-column min-vh-100">

<nav id="nav-custom" class="navbar navbar-expand-lg navbar-dark" style="background-color: #6eb5ff;">
    <div class="container-fluid fluid-custom" >
        <a class="navbar-brand" href="{{ route('site.index') }}">Health Life</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('site.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('site.cadastrar') }}">Cadastrar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('site.pesquisar') }}">Pesquisar Protocolo</a>
                </li>
            </ul>
        </div>
        <div class="mr-auto">
              <a href="{{ route('site.sair') }}"><button class="btn btn-lg btn-primary " style="background-color: #a5bfe5;border-color: #a5bfe5;">logout</button></a>
        </div>
    </div>
</nav>
<div id="logo" style="margin-top: 50px; display: flex; justify-content: center; flex-direction: column; align-items: center; width: 300; lenght: 290;">
      <img src="{{ asset('img/logo.png') }}" alt="logo.png" style="width: 300px; height: 290px; margin-bottom: -50px">
</div>
<div style="margin-top: 50px; display: flex; justify-content: center; flex-direction: column; align-items: center; ">
  <div style="width: 100%; max-width: 600px; padding: 20px; background-color: #fff; ">
    <p class="title" style="font-size: 24px; font-weight: bold; margin-bottom: 20px;">Pagina inicial da gerencia</p>
    <div>
      <a href="{{ route('site.gerencia_protocolo') }}"><button style="width: 100%; border-radius: 5px; background-color: #6eb5ff; border-color: #6eb5ff; color: white; margin-bottom: 10px;">pesquisar protocolos</button></a>      
    </div>
    <p></p>
  </div>
</div>
<footer class="footer mt-auto py-4 bg-dark" style="margin-top: 15px;">
    <div class="container text-center text-muted">
        <span style="color: #fff; ">Juan Geneses and Isael &copy; {{ date('Y') }}</span>
    </div>
</footer>
  </body>
</html>