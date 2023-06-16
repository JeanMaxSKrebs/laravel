<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        return response() -> json(Reserva::all());
    }

    public function store(Request $request)
    {
        try {
            $updatedReserva = $request->all();
            $storedReserva = Reserva::create($updatedReserva);
            return response()->json([
                'Message'=>"Reserva inserido com sucesso",
                'Reserva'=>$storedReserva
            ]);
        }catch(\Exception $error) {
            $responseError = [
                'Message'=>"Erro ao inserir o Reserva!",
                'Exception'=>$error->getMessage()
            ];
            return response()->json($responseError, 500);
        }
    }

    public function show(Reserva $reserva)
    {
        return response()->json($reserva);
    }

    public function update(Request $request, Reserva $reserva)
    {
        try {
            $updatedReserva = $request->all();
            $reserva->update($updatedReserva);
            return response()->json([
                'Message'=>"Reserva atualizado com sucesso",
                'Reserva'=>$reserva
            ]);
        } catch(\Exception $error) {
            $responseError = [
                'Message'=>"Erro ao atualizar o Reserva!",
                'Exception'=>$error->getMessage()
            ];
            return response()->json($responseError, 500);
        }
    }

    public function remove(Reserva $reserva)
    {
        try {
            $reserva->delete();//mixed
            return response()->json([
                'Message'=>"Reserva id:$reserva->id removido!",
            ]);
        } catch(\Exception $error) {
            $responseError = [
                'Message'=>"O reserva de id: $reserva->id não foi encontrado!",
                'Exception'=>$error->getMessage()
            ];
            return response()->json($responseError, 404);
        }
    }
}
