<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $query = Client::query();

        // Definir ordenação padrão
        $orderBy = $request->input('orderBy', 'name'); // Ordenar por nome por padrão
        $orderDirection = $request->input('orderDirection', 'asc'); // Ordem ascendente por padrão
    
        // Verificar se o campo de ordenação é válido
        $validColumns = ['name', 'email', 'phone']; // Lista de colunas válidas para ordenação
        if (!in_array($orderBy, $validColumns)) {
            $orderBy = 'name'; // Se o campo não for válido, ordenar por nome
        }
    
        // Aplicar ordenação
        $query->orderBy($orderBy, $orderDirection);
    
        // Verificar se há dados de filtro no request
        if ($request->filled('search')) {
            // Filtrar por nome, email ou telefone
            $searchTerm = $request->input('search');
            $query->where(function($query) use ($searchTerm) {
                $query->where('name', 'like', '%'.$searchTerm.'%')
                      ->orWhere('email', 'like', '%'.$searchTerm.'%')
                      ->orWhere('phone', 'like', '%'.$searchTerm.'%');
            });
        }
    
        $clients = $query->paginate(3); // Paginação com 20 itens por página
    
        return view('clients.index', [
            'clients' => $clients,
            'orderBy' => $orderBy,
            'orderDirection' => $orderDirection,
        ]);
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email',
            'phone' => 'required|string|max:20',
        ]);
    
        Client::create($validatedData);
    
        return redirect()->route('clients.index')->with('success', 'Cliente criado com sucesso!');
    }

    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.show', compact('client'));
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clientes,email,'.$id,
            'phone' => 'required'
        ]);

        $client = Client::findOrFail($id);
        $client->update($request->all());
        return redirect()->route('clients.index');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect()->route('clients.index');
    }
}
