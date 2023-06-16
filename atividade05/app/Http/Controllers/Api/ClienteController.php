<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        return response() -> json(Cliente::all());
    }

    public function store(Request $request)
    {
        try {
            $updatedCliente = $request->all();
            $storedCliente = Cliente::create($updatedCliente);
            return response()->json([
                'Message'=>"Cliente inserido com sucesso",
                'Cliente'=>$storedCliente
            ]);
        }catch(\Exception $error) {
            $responseError = [
                'Message'=>"Erro ao inserir o Cliente!",
                'Exception'=>$error->getMessage()
            ];
            return response()->json($responseError, 500);
        }
    }

    public function show(Cliente $cliente)
    {
        return response()->json($cliente);
    }

    public function update(Request $request, Cliente $cliente)
    {
        try {
            $updatedCliente = $request->all();
            $cliente->update($updatedCliente);
            return response()->json([
                'Message'=>"Cliente atualizado com sucesso",
                'Cliente'=>$cliente
            ]);
        } catch(\Exception $error) {
            $responseError = [
                'Message'=>"Erro ao atualizar o Cliente!",
                'Exception'=>$error->getMessage()
            ];
            return response()->json($responseError, 500);
        }
    }

    public function remove(Cliente $cliente)
    {
        try {
            $cliente->delete();//mixed
            return response()->json([
                'Message'=>"Cliente id:$cliente->id removido!",
            ]);
        } catch(\Exception $error) {
            $responseError = [
                'Message'=>"O cliente de id:$cliente->id não foi encontrado!",
                'Exception'=>$error->getMessage()
            ];
            return response()->json($responseError, 404);
        }
    }

    public function reservas(Cliente $cliente)
    {
        return response()->json($cliente->load('reservas'));
    }

    public function salao($nomeSalao)
    {
        $clientes = Cliente::whereHas(
                'cliente',
                fn($q)=>$q->where('nome',$nomeSalao)
            )->get();
        return response()->json($clientes);
    }
}
