<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
            if(!$user || !Hash::check($request->password, $user->password)) {
                throw new \Exception('Falha na autenticação!');
            }
            if ($user->is_admin) {
                $abilitie = ['is-admin'];
            } else if($user->is_manager){
                $abilitie = ['is-manager'];
            } else {
                $abilitie = ['is-client'];
            }
            
            // $token = $user->createToken($request->email, $abilitie)->plainTextToken;
            // $abilitie = $user->is_admin ? ['is-admin'] : [];
            $token = $user->createToken($request->email, $abilitie)->plainTextToken;
            return response()->json(['token'=>$token]);
        } catch(\Exception $error) {
            return response()->json([
                'erro'=>$error->getMessage()
            ], 401);
        }
    }

    public function logout(Request $request)
    {
        try {
            $auth_user = $request->user();
            if($request->has('all')) {
                $auth_user->tokens()->delete();
                $result = ['logout'=>'Removido todos os tokens, todos os dispositivos foram desconectados!'];
            }else{
                $auth_user->currentAccessToken()->delete();
                $result = ['logout'=>'Token removido, usuário desconectado!'];
            }
            return response()->json($result);
        } catch(\Exception $error) {
            return response()->json([
                'Error'=>$error->getMessage()
            ],500);
        }
    }
}
