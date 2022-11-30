<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VentaController extends Controller
{
    public function obtener(){
        $Venta = Venta::all();

        return response($Venta, 200);
    }

    public function crear(Request $request){
        $datos=$request->validate($this->validationRequest());

        $venta = Venta::create($datos);

        return response([
            'message'=> 'Se creo con exito el producto',
            'id'=> $venta['id']
        ], 201);
    }

    public function actualizar($id, Request $request){
        $venta = Venta::find($id);
        if(!$venta){
            return response([
                'message'=>'Error, no se encontro el producto ' . $id,
            ], 404);
        }

        $datos=$request->validate($this->validationRequest());


        $venta->update($datos);

        return response([
            'message'=> 'se modifico el producto ' . $id
        ]);
    }
    
    public function delete($id){
        $venta = Venta::find($id);

        if(!$venta){
             return response([
                 'message'=> 'Error no se encontro el producto ' . $id
             ],404);
         }

         $venta->delete();
         return response([
             'message'=> 'se elimino correctamente el producto ' . $id
         ]);

     }
     private function validationRequest(){
        return[
        'id_usuario'=>'required|numeric',
        'id_producto'=>'required|numeric'];
    }

}
