<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class LoginController extends Controller
{
    public function login(Request $request){

        $data = $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|min:3'
        ]);
        $usuario =  User::where('email', $data['email'])
        ->where('password', $data['password'])
        ->first();

        if (!$usuario){
            return response([
                'message' => 'favor de verificar las credenciales'
            ], 404);
        }

        $token = $usuario->createToken('user-Token')->plainTextToken;

        return response([
            'usuario'=>$usuario,
            'token'=> $token
        ]);

    }

}
