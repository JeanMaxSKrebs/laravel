<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Festa;
use Illuminate\Http\Request;

class FestaController extends Controller
{
    public function index()
    {
        return response() -> json(Festa::all());
    }

    public function store(Request $request)
    {
        try {
            $updatedFesta = $request->all();
            $storedFesta = Festa::create($updatedFesta);
            return response()->json([
                'Message'=>"Festa inserido com sucesso",
                'Festa'=>$storedFesta
            ]);
        }catch(\Exception $error) {
            $responseError = [
                'Message'=>"Erro ao inserir o Festa!",
                'Exception'=>$error->getMessage()
            ];
            return response()->json($responseError, 500);
        }
    }

    public function show(Festa $festa)
    {
        return response()->json($festa);
    }

    public function update(Request $request, Festa $festa)
    {
        try {
            $updatedFesta = $request->all();
            $festa->update($updatedFesta);
            return response()->json([
                'Message'=>"Festa atualizado com sucesso",
                'Festa'=>$festa
            ]);
        } catch(\Exception $error) {
            $responseError = [
                'Message'=>"Erro ao atualizar o Festa!",
                'Exception'=>$error->getMessage()
            ];
            return response()->json($responseError, 500);
        }
    }

    public function destroy(Festa $festa)
    {
        try {
            $festa->delete();//mixed
            return response()->json([
                'Message'=>"Festa id:$festa->id removido!",
            ]);
        } catch(\Exception $error) {
            $responseError = [
                'Message'=>"O festa de id: $festa->id não foi encontrado!",
                'Exception'=>$error->getMessage()
            ];
            return response()->json($responseError, 404);
        }
    }
}
