<!-- resources/views/site/pagina_ficha.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Ficha</title>
    <style>
        input[type="file"] {
             padding: 5px;
             background-color: #6eb5ff; 
             border-color: #6eb5ff; 
             margin-bottom: 10px;
             box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3);
             border-radius: 5px;
             
        }

        p {
            text-align: center;
            width: 100%;
            width: 450px; 
            border-radius: 5px; 
            background-color: #f8d7da; 
            border-color: #f8d7da; 
            color: black; 
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3); 
            padding: 5px;
        }

        .alert {
            margin-left: 107px; 
            margin-right: 107px;
        }
        .alert.alert-warning {
            background-color: #f8d7da; 
            border-color: #f8d7da; 
            /*border: #a3cfbb;
            background-color: #a3cfbb;*/
            text-align: center;
            width: 450px; 
            border-radius: 5px; 
            color: black; 
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3); 
            padding: 5px;
        }

        button { width: 100%;
             
             background-color: #6eb5ff; 
             border-color: #6eb5ff; 
             color: black; 
             margin-bottom: 10px;
            }
    </style>
</head>
<body>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Título da página</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
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
        <div class="mr-auto">
              <a href="{{ route('site.sair') }}"><button class="btn btn-lg btn-primary " style="background-color: #a5bfe5;border-color: #a5bfe5;">logout</button></a>
        </div>
    </div>
</nav>
<div id="logo" style="margin-top: 50px; display: flex; justify-content: center; flex-direction: column; align-items: center; width: 300; lenght: 290;">
  <img src="{{ asset('img/logo.png') }}" alt="logo.png" style="width: 300px; height: 290px; margin-bottom: -50px">
</div>
<div id="logo" style="margin-top: 50px; display: flex; justify-content: center; flex-direction: column; align-items: center; width: 300; lenght: 290;">
</div>
    <!-- Adicione outras informações específicas do protocolo conforme necessário -->

    <!-- site/pagina_ficha.blade.php -->
<div style="margin-top: 50px; display: flex; justify-content: center; flex-direction: column; align-items: center; ">
<h1>Detalhes do Protocolo {{ $cadastro->Protocolo }}</h1>
        <h6>Informações Fornecidas no Cadastro:</h6>
        <ul>
            <li>RG: {{ $cadastro->RG }}</li>
            <li>CPF: {{ $cadastro->CPF }}</li>
            <li>NCS: {{ $cadastro->NCS }}</li>
            <!-- Adicione outras informações conforme necessário -->
        </ul>
        <form action="{{ route('site.salvar_arquivo', ['protocolo' => $protocolo]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="arquivo" accept=".pdf, .doc, .docx">
            <button type="submit" style="border-radius: 5px; margin-top: 15px; margin-bottom: 15px;">Salvar Arquivo</button>
        </form>

        @if(session('success'))
            <div class="alert alert-success" style="border-radius: 5px; width: 300; lenght: 290; text-align: center;">
            {{ session('success') }}
            </div>
        @elseif(session('warning'))
            <div class="alert alert-warning" style="border-radius: background-color: #f8d7da; border-color: #f8d7da; 5px;  width: 300; lenght: 290; text-align: center;">
                {{ session('warning') }}
            </div>
        @elseif($arquivoSalvo)
            <p>Arquivo já foi salvo anteriormente.</p>
         @endif   
    <a href="{{ route('site.gerencia_protocolo') }}">
        <button style="border-radius: 5px; margin-bottom: 40px;">Voltar para a Lista de Protocolos</button>
    </a>
</div>
<footer class="footer mt-auto py-4 bg-dark" style="margin-top: 15px;">
    <div class="container text-center text-muted">
        <span style="color: #fff; ">Juan Geneses and Isael &copy; {{ date('Y') }}</span>
    </div>
</footer>
</body>
</html>