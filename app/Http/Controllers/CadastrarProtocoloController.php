<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cadastro;

class CadastrarProtocoloController extends Controller
{
    public function mostrarFormularioCadastro() {
        return view('site.cadastrar_protocolo');
    }

    public function CadastrarProtocolo(Request $request) {

        // Gere um número de protocolo único
        $protocolo = $this->gerarProtocoloUnico();

        // Cadastra os valores no banco
        $cadastrar = new Cadastro;
        $cadastrar->RG = $request->input('RG');
        $cadastrar->CPF = $request->input('CPF');
        $cadastrar->NCS = $request->input('NCS');
        $cadastrar->Protocolo = $protocolo;


        try {
            $cadastrar->save();

            // Mensagem de sucesso
            $request->session()->flash('numero_protocolo', $protocolo);
            $request->session()->flash('success', 'Cadastro realizado com sucesso!');
        } catch (\Exception $e) {
            // Mensagem de erro
            $request->session()->flash('error', 'Erro ao cadastrar: ' . $e->getMessage());
        }

        //se descomentar essa parte, retorna os valores salvos na tela
        /*echo '<pre>';
            print_r($cadastrar->getAttributes());
        echo '</pre>';*/

        return view('site.cadastrar_protocolo');
    }

    private function gerarProtocoloUnico()
    {
        // Lógica para gerar um número de protocolo único, por exemplo, timestamp + randômico
        return time() . rand(1000, 9999);
    }
}
