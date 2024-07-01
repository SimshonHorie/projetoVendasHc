<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Pedido;


class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        // Verifica se o usuário é um administrador
        if ($request->user() && $request->user()->role !== 'admin') {
            abort(403, 'Acesso não autorizado.');
        }

        // Se for administrador, continua com a lógica do método
        // ...

        return view('admin.dashboard');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all(); // Obtém todos os clientes do banco de dados
        $pedidos = Pedido::all(); // Obtém todos os pedidos do banco de dados

        return view('dashboard', compact('clients', 'pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
