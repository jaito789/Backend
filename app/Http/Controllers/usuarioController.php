<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class usuarioController extends Controller
{
    public function obtener(){

        //todos los usuarios
       //$usuarios = Usuario::all();
       //return $usuarios;

       //usuarios paginados
       //$usuarios = Usuario::paginate(2);

       //$usuarios = Usuario::count();
       $usuarios = User::all();
       return $usuarios;
    }

    public function agregar(Request $request){
        //$datos = $request->all();
        $datos=$request->validate($this->validationRequest());

        $usuarios = User::create($datos);
        return response([
            'message'=> 'Se creo con exito el usuario',
            'id'=> $usuarios['id']
        ], 201);
    }

    /*public function editar($id, Request $request)
    {
        $usuarios = User::find($id);
        //validar si existe usuario
        if(!$usuarios){
            return response([
                'message'=> 'ERROR, NO SE ENCONTRO EL USUARIO' . $id
            ], 404);
        }

        //todo bien

        $datos=$request->validate($this->validationRequest());

        $usuarios->update($datos);

        return response([
            'message'=>'se modifico con exito el usuario ' . $id
        ]);

    }*/

    public function update($id, Request $request)
    {

        $usuarios = User::find($id);
        if(!$usuarios){
            return response([
                'message'=>'ERROR, NO SE ENCONTRO EL USUARIO' . $id
            ], 404);
        }else if(!$usuarios["codigo_verificacion"]){
            return response(['message'=>'ERROR, no se puede cambiar'], 200);
        }else if ($request["codigo_verificacion"]== $usuarios["codigo_verificacion"]){
            $usuarios -> update(["password" => $request["password"], "codigo_verificacion"=>'']);
            return response([
                'message'=>'Contrase;a actualizada'
            ]);
        }

        return response([
            'message'=>'codigo invalido'
        ]);
    }

    public function codigo($id, Request $request){
        $usuarios = User::find($id);
        //validar si existe usuario
        if(!$usuarios){
            return response([
                'message'=> 'ERROR, NO SE ENCONTRO EL USUARIO' . $id
            ], 404);
        }

        $code = Str::random(10);
        $usuarios -> update(["codigo_verificacion" => $code]);
        return response([
            'message'=> 'el codigo es' . $code
        ]);

    }

    public function eliminar($id){

        $usuarios = User::find($id);
        //validar si existe usuario
        if(!$usuarios){
            return response([
                'message'=> 'ERROR, NO SE ENCONTRO EL USUARIO' . $id
            ], 404);
        }

        $usuarios->delete();
        return response([
            'message'=> 'se elimino el usuario ' .  $id
        ]);


    }

    private function validationRequest(){
        return
        [
        'name'=>'required|string',
        'email'=>'required|email',
        'password'=>'required|min:6',
        'codigo_verificacion'=>'required|min:10',
        ] ;
    }
}
