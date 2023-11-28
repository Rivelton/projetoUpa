<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Pesquisar Protocolo</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="d-flex flex-column min-vh-100">
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
<div style="margin-top: 50px; display: flex; justify-content: center; flex-direction: column; align-items: center; ">
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
        
        <!-- Adicione um botão para visualizar o PDF apenas se o PDF estiver disponível -->
        @if(session('pdf_path'))
        <a href="{{ route('site.visualizar_pdf_real', ['pdf_path' => $pdf_path]) }}" class="btn btn-primary">Visualizar PDF</a>
        @endif
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

  <form action="{{ route('site.pesquisar') }}" method="post" style="width: 100%; max-width: 600px; padding: 20px; background-color: #fff; ">
           @csrf
          <input name="protocolo" type="text"  placeholder="Digite o protocolo" style="border-radius: 5px; width: 100%; margin-bottom: 15px;" required></input>
          <div style="display: flex; flex-direction: column; align-items: center;">
            <button style="width: 100%; border-radius: 5px; background-color: #6eb5ff; border-color: #6eb5ff; color: white; margin-bottom: 10px;">Pesquisar Protocolo</button>
          </div>
    </form>
    <br>
        <p>Já pode renderizar a Ficha de Atendimento aqui</p>
        <a href="{{ route('site.index') }}"><button style="width: 100%; border-radius: 5px; background-color: #6c757d; border-color: #6c757d; color: white; margin-bottom: 10px;">Voltar</button></a>
        <script src="{{ asset('resources/js/app.js') }}"></script>
</div>

<script>
    function visualizarPDF(pdfPath) {
        window.location.href = pdfPath;
    }
</script>
<footer class="footer mt-auto py-4 bg-dark" style="margin-top: 15px;">
    <div class="container text-center text-muted">
        <span style="color: #fff; ">Juan Geneses and Isael &copy; {{ date('Y') }}</span>
    </div>
</footer>
    
</body>
</html>