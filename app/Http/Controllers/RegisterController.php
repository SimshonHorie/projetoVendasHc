<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
        public function register(Request $request)
        {
            // Valida��o dos dados do formul�rio
        $request->validate([
            'user' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Cria��o do usu�rio como usu�rio padr�o
        $user = User::create([
            'name' => $request->user,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Definindo automaticamente como usu�rio padr�o
        ]);

        // Redirecionamento ap�s o registro
        return redirect()->route('login')->with('success', 'Usu�rio registrado com sucesso!');
    }
}
