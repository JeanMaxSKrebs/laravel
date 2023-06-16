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

    public function show($id)
    {
        try {
            $reserva = Reserva::findOrFail($id);
            return response()->json($reserva);
        } catch(\Exception $error) {
            $responseError = [
                'message' => "A Reserva de ID: $id não foi encontrado!",
                'exception' => $error->getMessage()
            ];
            return response()->json($responseError, 404);
        }
    }    

    public function update(Request $request, $id)
    {
        try {
            $newReserva = $request->all();
            $updatedReserva = Reserva::findOrFail($id);
            $updatedReserva->update($newReserva);
            
            return response()->json([
                'Message' => "Reserva atualizada com sucesso",
                'Reserva' => $updatedReserva
            ]);
        } catch (\Exception $error) {
            $responseError = [
                'Message' => "Erro ao atualizar a reserva",
                'Exception' => $error->getMessage()
            ];
            return response()->json($responseError, 500);
        }
    }

    public function remove($id)
    {
        try {
            $reserva = Reserva::findOrFail($id);
            $reserva->delete();
            
            return response()->json([
                'Message' => "Reserva removida com sucesso",
                'Reserva' => $reserva
            ]);
        } catch (\Exception $error) {
            $responseError = [
                'Message' => "A reserva de ID: $id não foi encontrada",
                'Exception' => $error->getMessage()
            ];
            return response()->json($responseError, 404);
        }
    }

}
