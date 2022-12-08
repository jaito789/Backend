<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmpresaController extends Controller
{
    public function EmpresasObtener(){
        $empresas = Empresa::all();
        return $empresas;
    }
    public function obtenerunaempresa($id){
        $empresas = Empresa::find($id);
        if(!$empresas){
            return response([
                'message'=>'Error, no se encontro la empresa ' . $id,
            ], 404);
        }
        return $empresas;

    }
    public function AltaEmpresa(Request $request){
        $datos=$request->validate($this->validationRequest());

        $empresa = Empresa::create($datos);

        return response([
            'message'=> 'Se dio de alta la empresa',
            'id'=> $empresa['id']
        ], 201);
    }
    public function ModificarEmpresa($id, Request $request){
        $empresa = Empresa::find($id);
        if(!$empresa){
            return response([
                'message'=>'Error, no se encontro a la empresa ' . $id,
            ], 404);
        }
        $datos=$request->validate($this->validationRequest());


        $empresa->update($datos);

        return response([
            'message'=> 'se modifico la empresa con el id ' . $id
        ]);
    }
    public function BajaEmpresa($id){
        $empresa = Empresa::find($id);

        if(!$empresa){
             return response([
                 'message'=> 'Error no se encontro la empresa con el id ' . $id
             ],404);
         }

         $empresa->delete();
         return response([
             'message'=> 'se dio de baja la empresa con el id ' . $id
         ]);

     }
    private function validationRequest(){
        return
        [
            'NombreEmpresa'=>'required|string',
            'CIF'=>'required|string',
            'Localidad'=>'required|string',
            'Direccion'=>'required|string',
            'Email'=>'required|email',
            'DireccionWeb'=>'required|string',
            'Telefono'=>'required|string',
        ];
    }
}
