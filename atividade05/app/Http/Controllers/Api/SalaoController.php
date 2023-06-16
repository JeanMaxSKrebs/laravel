<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Salao;
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
    

    public function update(Request $request, Salao $salao)
    {
        try {
            $updatedSalao = $request->all();
            $salao->update($updatedSalao);
            return response()->json([
                'Message'=>"Salao atualizado com sucesso",
                'Salao'=>$salao
            ]);
        } catch(\Exception $error) {
            $responseError = [
                'Message'=>"Erro ao atualizar o Salao!",
                'Exception'=>$error->getMessage()
            ];
            return response()->json($responseError, 500);
        }
    }

    public function remove(Salao $salao)
    {
        try {
            $salao->delete();//mixed
            return response()->json([
                'Message'=>"Salao id:$salao->id removido!",
            ]);
        } catch(\Exception $error) {
            $responseError = [
                'Message'=>"O salao de id: $salao->id não foi encontrado!",
                'Exception'=>$error->getMessage()
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
        $saloes = Salao::whereHas(
                'reservas',
                fn($q)=>$q->where('cliente_id',$nomeCliente)
            )->get();
        return response()->json($saloes);
    }
    
}
