<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Protocolos;
use Illuminate\Support\Facades\Response;

class PesquisarProtocoloController extends Controller
{

    public function ProcurarProtocolo() {
        return view('site.pesquisar_protocolo');
    }

    public function PesquisarProtocolo(Request $request) {

        $protocolo = $request->get('protocolo');
        $flag = true;

        $registro = Protocolos::where('Protocolo', $protocolo)
            ->where('ProtocoloFlag', $flag)
            ->first();

        

        // Retorna o PDF para visualização ou download if ($caminhoArquivo != '' && $caminhoArquivo != null)
        if ($registro) {
            $caminhoArquivo = $registro->caminho_arquivo;
            $caminhoArquivo = str_replace("arquivos/", "", $caminhoArquivo);

            $numeroProtocolo = $registro->Protocolo;


            if ($caminhoArquivo != '' && $caminhoArquivo != null) {
                // Exibe a view com um botão para abrir o PDF
                return view('site.visualizar_pdf', ['pdf_path' => $caminhoArquivo, 'nProtocolo' => $numeroProtocolo]);
            } else {
                // Se o arquivo não existe, informa ao usuário
                return redirect()->route('site.pesquisar')->with('error', 'O arquivo PDF não está disponível.');
            }
        } else {
            // Se não existe, informa ao usuário
            return redirect()->route('site.pesquisar')->with('error', 'O protocolo não foi encontrado ou não está pronto.');
        }


                /* Verifica se o arquivo existe
                if (file_exists($caminhoArquivo)) {
                    // Retorna o PDF para visualização ou download
                    return Response::make(file_get_contents('C:/wamp64/www/projetoUPA/projetoUpa/storage/app/' . $caminhoArquivo), 200, [
                        'Content-Type' => 'application/pdf',
                        'Content-Disposition' => 'inline; filename="documento.pdf"',
                    ]);
                } else {
                    // Se o arquivo não existe, informa ao usuário
                    echo "O arquivo PDF não está disponível.";
                }
            } else {
                // Se não existe, informe ao usuário
                echo "O protocolo não foi encontrado ou não está pronto.";
            }*/
    
            
        

        //return view('site.pesquisar_protocolo');
    }

    public function VisualizarPDFReal($pdf_path) {
        $pdfContent = file_get_contents('C:/wamp64/www/projetoUPA/projetoUpa/storage/app/arquivos/' . $pdf_path);

        return Response::make($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="documento.pdf"',
        ]);
    }
}
