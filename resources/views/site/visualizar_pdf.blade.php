<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<nav id="nav-custom" class="navbar navbar-expand-lg navbar-dark" style="background-color: #6eb5ff;">
    <div class="container-fluid fluid-custom" >
        <a class="navbar-brand" href="{{ route('site.index') }}">Health Life</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
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
    </div>
</nav>
<div id="logo" style="margin-top: 50px; display: flex; justify-content: center; flex-direction: column; align-items: center; width: 300; lenght: 290;">
      <img src="{{ asset('img/logo.png') }}" alt="logo.png" style="width: 300px; height: 290px; margin-bottom: -50px">
</div>
<div class="container mt-5">
    <div class="text-center">
        <h2>Visualizar Sua Ficha - Protocolo {{ $nProtocolo }}</h2>
        <div class="mt-3">
            <!-- Adicione um botão para voltar à página anterior -->
            

        </div>
    </div>
    <!-- Adicione um iframe para exibir o PDF -->
    <div>
        <iframe src="{{ route('site.visualizar_pdf_real', ['pdf_path' => $pdf_path]) }}" width="100%" height="600px"></iframe>
    </div>
    <div class="mt-3" style="margin-bottom: 15px;">
        <a href="{{ route('site.visualizar_pdf_real', ['pdf_path' => $pdf_path]) }}" class="btn btn-primary">Visualizar PDF</a>
        <a href="{{ route('site.pesquisar') }}" class="btn btn-secondary">Voltar</a>
    </div>
</div>
<footer class="footer mt-auto py-4 bg-dark">
    <div class="container text-center text-muted">
        <span style="color: #fff; ">Juan Geneses and Isael &copy; {{ date('Y') }}</span>
    </div>
</footer>

</body>
</html>