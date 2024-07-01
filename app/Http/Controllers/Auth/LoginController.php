<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validação dos dados do formulário
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
            // Verifica se o usuário é administrador e redireciona para o painel de administrador
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            // Caso contrário, redireciona para o dashboard padrão
            return redirect()->route('dashboard');
        }

        // Login falhou, redireciona de volta para a página de login com uma mensagem de erro
        return redirect()->route('login')->withErrors(['login' => 'Credenciais inválidas.']);
    }
}
