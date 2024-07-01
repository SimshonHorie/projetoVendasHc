<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
        public function register(Request $request)
        {
            // Validação dos dados do formulário
        $request->validate([
            'user' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Criação do usuário como usuário padrão
        $user = User::create([
            'name' => $request->user,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Definindo automaticamente como usuário padrão
        ]);

        // Redirecionamento após o registro
        return redirect()->route('login')->with('success', 'Usuário registrado com sucesso!');
    }
}
