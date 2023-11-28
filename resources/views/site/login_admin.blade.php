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
  <form action="{{ route('site.login') }}" method="post" style="width: 100%; max-width: 600px; padding: 20px; background-color: #fff; ">
      @csrf
        <div>
            <label for=""></label>
            <input name="login" type="text" value="{{ old('login') }}" placeholder="Login" style="border-radius: 5px; width: 100%;">
            @if($errors->has('senha'))
            <div style="width: 100%; border-radius: 5px; background-color: #f8d7da; border-color: #f8d7da; color: black; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3); padding: 5px; margin-top: 5px;">
            {{ $errors->has('login') ? $errors->first('login') : ''}}
            </div> 
            @endif 
        </div>
        <div>
            <label for=""></label>
            <input name="senha" type="password" value="{{ old('senha') }}" placeholder="senha" style="border-radius: 5px; width: 100%;">
            @if($errors->has('senha'))
            <div style="width: 100%; border-radius: 5px; background-color: #f8d7da; border-color: #f8d7da; color: black; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3); padding: 5px; margin-top: 5px;">
              {{ $errors->has('senha') ? $errors->first('senha') : ''}}
            </div> 
            @endif 
        </div>
        <div style="display: flex; flex-direction: column; align-items: center; margin-top: 15px;">
            <button type="submit" style="width: 100%; border-radius: 5px; background-color: #6eb5ff; border-color: #6eb5ff; color: white; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3);">Login</button>
        </div>
    </form>
    <a href="{{ route('site.index') }}" style="width: 100%; border-radius: 5px; background-color: #6eb5ff; border-color: #6eb5ff; color: white; max-width: 560px;"><button style="width: 100%; border-radius: 5px; background-color: #6eb5ff; border-color: #6eb5ff; color: white; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3);">Voltar</button></a>
          <p></p>
        {{ isset($erro) && $erro != '' ? $erro : ''}}
        @if(isset($nomeSessao) && isset($loginSessao))
          <p>Nome na Sessão: {{ $nomeSessao }}</p>
          <p>Login na Sessão: {{ $loginSessao }}</p>
        @endif
</div>
<footer class="footer mt-auto py-4 bg-dark" style="margin-top: 15px;">
    <div class="container text-center text-muted">
        <span style="color: #fff; ">Juan Geneses and Isael &copy; {{ date('Y') }}</span>
    </div>
</footer>    
    
  </body>
</html>