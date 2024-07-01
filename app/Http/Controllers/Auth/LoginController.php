<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Valida��o dos dados do formul�rio
        $request->validate([
            'user' => 'required|string',
            'password' => 'required|string',
        ]);

        // Tentativa de login
        $credentials = [
            'name' => $request->user,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            // Verifica se o usu�rio � administrador e redireciona para o painel de administrador
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            // Caso contr�rio, redireciona para o dashboard padr�o
            return redirect()->route('dashboard');
        }

        // Login falhou, redireciona de volta para a p�gina de login com uma mensagem de erro
        return redirect()->route('login')->withErrors(['login' => 'Credenciais inv�lidas.']);
    }
}
