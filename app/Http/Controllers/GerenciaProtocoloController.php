<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cadastro;
use App\Models\Protocolos;

class GerenciaProtocoloController extends Controller
{
    public function GerenciaProtocolo() {
        $cadastros = Cadastro::all();
        return view('site.gerencia_protocolo', ['cadastros' => $cadastros]);
    }

    public function PaginaFicha($protocolo) {
        // Lógica para lidar com a página específica
        // Consulta ao banco de dados para obter as informações do cadastro pelo protocolo
        $cadastro = Cadastro::where('Protocolo', $protocolo)->first();
    
        // Verifique se o cadastro foi encontrado
        if (!$cadastro) {
            // Trate o caso em que o cadastro não foi encontrado, por exemplo, redirecionando para uma página de erro
            return redirect()->route('site.gerencia_protocolo')->with('error', 'Cadastro não encontrado.');
        }
    
        // Verifique se o arquivo já foi salvo
        $arquivoSalvo = $this->arquivoSalvo($protocolo);
    
        // Pode ser outra view ou qualquer outra funcionalidade que você deseja implementar
        return view('site.pagina_ficha', ['protocolo' => $protocolo, 'cadastro' => $cadastro, 'arquivoSalvo' => $arquivoSalvo]);
    }

    public function detalhesProtocolo($protocolo) {
        $cadastro = Cadastro::where('Protocolo', $protocolo)->first();
    
        // Outras lógicas para processar os detalhes do protocolo, se necessário
    
        return view('site.detalhes_protocolo', ['cadastro' => $cadastro]);
    }

    public function salvarArquivo(Request $request, $protocolo)
{
    // Valide e armazene o arquivo enviado
    $request->validate([
        'arquivo' => 'required|mimes:pdf,doc,docx|max:2048', // Aceita apenas arquivos PDF e DOC
    ]);

    $arquivo = $request->file('arquivo');

    // Gere um nome único para o arquivo
    $nomeArquivo = time() . '_' . $arquivo->getClientOriginalName();

    // Salve o arquivo na pasta de armazenamento
    $arquivo->storeAs('arquivos', $nomeArquivo);

    // Encontre ou crie uma instância do modelo Protocolos
    $protocoloModel = Protocolos::firstOrNew(['Protocolo' => $protocolo]);

    // Verifique se o arquivo já existe
    if (!$this->arquivoSalvo($protocolo)) {
        // Certifique-se de que a coluna 'caminho_arquivo' existe na tabela 'protocolos'
        $protocoloModel->caminho_arquivo = 'arquivos/' . $nomeArquivo;

        // Defina a flag como true
        $protocoloModel->ProtocoloFlag = true;

        // Associar o número de cadastro do admin ao protocolo
        $protocoloModel->N_de_identificacao = $_SESSION['N_de_cadastro'];

        $protocoloModel->save();

        // Redirecione de volta para a página de detalhes do protocolo
        return redirect()->route('site.pagina_ficha', ['protocolo' => $protocolo])->with('success', 'Arquivo salvo com sucesso.');
    }

    // Se o arquivo já foi salvo, exiba a mensagem de aviso apenas se a flag for verdadeira
    if ($protocoloModel->ProtocoloFlag) {
        return redirect()
            ->route('site.pagina_ficha', ['protocolo' => $protocolo])
            ->with('warning', 'Arquivo já foi salvo anteriormente.');
    }

    // Redirecione para a página de detalhes do protocolo se a flag for falsa (caso especial após o primeiro salvamento)
    return redirect()->route('site.pagina_ficha', ['protocolo' => $protocolo]);
}

        public function arquivoSalvo($protocolo)
        {
            // Verifica se o arquivo já foi salvo para o protocolo específico
            $protocoloModel = Protocolos::where('Protocolo', $protocolo)->first();

            // Retorna true se o arquivo foi salvo anteriormente, false caso contrário
            return $protocoloModel && $protocoloModel->ProtocoloFlag;
        }

}