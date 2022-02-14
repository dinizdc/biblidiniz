<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {


        $erro = '';

        if (request('erro') == 1) {
            $erro = 'Senha ou nome de usuário incorretos.';
        }

        if (request('erro') == 2) {
            $erro = 'Para acessar a página requisitada você deverá fazer o login.';
        }

        return view('site.login', ['erro' => $erro, 'usuario' => request('usuario')]);
    }

    public function autenticar(Request $request)
    {
        $param = [
            'usuario' => 'email',
            'senha' => 'required'
        ];
        $passagem = [
            'usuario.email' => 'Um e-mail válido é obrigatório!',
            'senha.required' => 'A senha é obrigatória!'
        ];

        $request->validate($param, $passagem);

        $email = request('usuario');
        $password = request('senha');

        $user = new User();

        $usuario = $user->where('email', $email)
            ->where('password', $password)
            ->get()
            ->first();

        if (isset($usuario->name)) {
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('livros.listar');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }
    public function sair()
    {
        if (session_status() === PHP_SESSION_ACTIVE)
            $_SESSION = array();
        // return redirect()->route('livros.home');
        // Se é preciso matar a sessão, então os cookies de sessão também devem ser apagados.
        // Nota: Isto destruirá a sessão, e não apenas os dados!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        // Por último, destrói a sessão
        session_destroy();
    }
}
