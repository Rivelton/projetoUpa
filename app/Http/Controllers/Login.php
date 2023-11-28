<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class Login extends Controller
{
    public function sair(Request $request) {
        //destroi a sessao, para n permitir o acesso sem estar logado
        session_destroy();
        
        $request->session()->flush(); // Limpa todos os dados da sessão
        return redirect()->route('site.login');
       
    }

    public function mostrarLogin(Request $request) {

        //apresenta mensagem de erro, dependendo do parametro passado
        $erro = '';
        
        if($request->get('erro') == 'login_inexistente'){
            $erro = ' Login e/ou senha Invalida ';
        };

        if($request->get('erro') == 'falha_autenteicacao'){
            $erro = 'Falha de autenticação, por favor realize o Login para ter acesso';
        };

        return view('site.login_admin', ['erro'=>$erro]);
    }

    public function Login(Request $request) {

        $regra = [
            'login' => 'email',
            'senha' => 'required',
        ];

        $feedback = [
            'login.email' => ' O login (email) é obrigatorio ',
            'senha.required' => 'A senha é obrigatorio',
        ];

        //se n passar, voltar pra rota login:get
        $request->validate($regra, $feedback);

        //recupera os valores do formulario para autenticação
        $login = $request->get('login');
        $senha = $request->get('senha');

        //Verifica autenticação
        $admin = new Admin();
        $existe = $admin->where('Login', $login)->where('Senha', $senha)->get()->first();
        

        //testa o retorno do banco
        /*echo "<pre>";
        dd($existe);
        print_r($existe->Login);
        echo "</pre>"*/;
        
        //verifica se existe login no banco, caso n exista retorna com erro de login
        if(isset($existe->Nome)) {

            session_start();
            $_SESSION['Nome'] = $existe->Nome;
            $_SESSION['Login'] = $existe->Login;
            $_SESSION['N_de_cadastro'] = $existe->N_de_cadastro;


            return redirect()->route('site.gerencia');
        } else {
            return redirect()->route('site.login', ['erro' => '?erro=login_inexistente']);
        };

        return view('site.login_admin');
    }
}
