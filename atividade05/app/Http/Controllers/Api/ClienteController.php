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

    public function show($id)
    {
        try {
            $cliente = Cliente::findOrFail($id);
            return response()->json($cliente);
        } catch(\Exception $error) {
            $responseError = [
                'message' => "A Cliente de ID: $id não foi encontrado!",
                'exception' => $error->getMessage()
            ];
            return response()->json($responseError, 404);
        }
    }   

    public function update(Request $request, $id)
    {
        try {
            $newCliente = $request->all();
            $updatedCliente = Cliente::findOrFail($id);
            $updatedCliente->update($newCliente);
            
            return response()->json([
                'Message' => "Cliente atualizada com sucesso",
                'Cliente' => $updatedCliente
            ]);
        } catch (\Exception $error) {
            $responseError = [
                'Message' => "Erro ao atualizar a cliente",
                'Exception' => $error->getMessage()
            ];
            return response()->json($responseError, 500);
        }
    }

    public function remove($id)
    {
        try {
            $cliente = Cliente::findOrFail($id);
            $cliente->delete();
            
            return response()->json([
                'Message' => "Cliente removida com sucesso",
                'Cliente' => $cliente
            ]);
        } catch (\Exception $error) {
            $responseError = [
                'Message' => "A cliente de ID: $id não foi encontrada",
                'Exception' => $error->getMessage()
            ];
            return response()->json($responseError, 404);
        }
    }
    
    public function reservas($id)
    {
        try {
            $cliente = Cliente::findOrFail($id);
            $reservas = $cliente->reservas;

            return response()->json($reservas);
        } catch (\Exception $error) {
            $responseError = [
                'Message' => "O cliente de ID: $id não foi encontrado",
                'Exception' => $error->getMessage()
            ];
            return response()->json($responseError, 404);
        }
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
