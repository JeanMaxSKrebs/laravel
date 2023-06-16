<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Salao;
use App\Models\Reserva;
use Illuminate\Http\Request;

class SalaoController extends Controller
{  
    public function index()
    {
        return response() -> json(Salao::all());
    }

    public function store(Request $request)
    {
        try {
            $updatedSalao = $request->all();
            $storedSalao = Salao::create($updatedSalao);
            return response()->json([
                'Message'=>"Salao inserido com sucesso",
                'Salao'=>$storedSalao
            ]);
        }catch(\Exception $error) {
            $responseError = [
                'Message'=>"Erro ao inserir o Salao!",
                'Exception'=>$error->getMessage()
            ];
            return response()->json($responseError, 500);
        }
    }
    public function show($id)
    {
        try {
            $salao = Salao::findOrFail($id);
            return response()->json($salao);
        } catch(\Exception $error) {
            $responseError = [
                'message' => "O salão de ID: $id não foi encontrado!",
                'exception' => $error->getMessage()
            ];
            return response()->json($responseError, 404);
        }
    }    
    

    public function update(Request $request, $id)
    {
        try {
            $newSalao = $request->all();
            $updatedSalao = Salao::findOrFail($id);
            $updatedSalao->update($newSalao);
            
            return response()->json([
                'Message' => "Salão atualizado com sucesso",
                'Salao' => $updatedSalao
            ]);
        } catch (\Exception $error) {
            $responseError = [
                'Message' => "Erro ao atualizar o Salão",
                'Exception' => $error->getMessage()
            ];
            return response()->json($responseError, 500);
        }
    }
    
    public function remove($id)
    {
        try {
            $salao = Salao::findOrFail($id);
            $salao->delete();
            
            return response()->json([
                'Message' => "Salão removido com sucesso",
                'Salao' => $salao
            ]);
        } catch (\Exception $error) {
            $responseError = [
                'Message' => "O salão de ID: $id não foi encontrado",
                'Exception' => $error->getMessage()
            ];
            return response()->json($responseError, 404);
        }
    }


    public function reservas(Salao $salao)
    {
        return response()->json($salao->load('reservas'));
    }

    public function cliente($nomeCliente)
    {
        $saloes = Salao::whereHas('reservas', function ($query) use ($nomeCliente) {
            $query->whereHas('cliente', function ($query) use ($nomeCliente) {
                $query->where('nome', $nomeCliente);
            });
        })->get();
        

        if ($saloes->isEmpty()) {
            return response()->json([
                'message' => 'Nenhum salão encontrado para o cliente: ' . $nomeCliente
            ], 404);
        }

        return response()->json($saloes);
    }

    
}
