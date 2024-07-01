<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Services\ApiServicesPecas; 

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::all();
        return view('pedidos.index', compact('pedidos'));
    }

    public function create(ApiServicesPecas $apiPecasService)
    {
        $pecas = $apiPecasService->getPecas();
        return view('pedidos.create', compact('pecas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'descricao' => 'required|string',
            'valor' => 'required|numeric',
            'data_pedido' => 'nullable|date_format:Y-m-d',
            'status' => 'required|string|in:Pendente,Concluído',
        ]);

        Pedido::create($validatedData);

        return redirect()->route('pedidos.index')->with('success', 'Pedido criado com sucesso.');
    }

    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('pedidos.edit', compact('pedido'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'descricao' => 'required|string|max:255',
            'valor' => 'required|numeric',
        ]);

        $pedido = Pedido::findOrFail($id);
        $pedido->update($validatedData);

        return redirect()->route('pedidos.index')->with('success', 'Pedido atualizado com sucesso!');
    }

    public function show($id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('pedidos.show', compact('pedido'));
    }

    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();

        return redirect()->route('pedidos.index')->with('success', 'Pedido deletado com sucesso!');
    }
}
