<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Protocolo</title>
</head>
<body>

    <h1>Detalhes do Protocolo {{ $cadastro->Protocolo }}</h1>

    <table border="1">
        <tr>
            <th>Coluna</th>
            <th>Valor</th>
        </tr>
        <tr>
            <td>Outra Coluna</td>
            <td>{{ $cadastro->outraColuna }}</td>
        </tr>
        <!-- Adicione mais linhas conforme necessário para outras informações -->
    </table>

    <a href="{{ route('site.gerencia_protocolo') }}">
        <button>Voltar para a Lista de Protocolos</button>
    </a>
    <footer class="footer mt-auto py-4 bg-dark" style="margin-top: 15px;">
    <div class="container text-center text-muted">
        <span style="color: #fff; ">Juan Geneses and Isael &copy; {{ date('Y') }}</span>
    </div>
</footer>
</body>
</html>
