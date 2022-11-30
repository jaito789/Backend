<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductoController extends Controller
{
    public function obtener(){
        $products = Producto::all();

        return response($products,200);
        //return $products;
    }

    public function crear(Request $request){
        $datos=$request->validate($this->validationRequest());

        $products = Producto::create($datos);

        return response([
            'message'=> 'Se creo con exito el producto',
            'id'=> $products['id']
        ], 201);
    }

    public function actualizar($id, Request $request){
        $products = Producto::find($id);
        if(!$products){
            return response([
                'message'=>'Error, no se encontro el producto ' . $id,
            ], 404);
        }

        $datos=$request->validate($this->validationRequest());


        $products->update($datos);

        return response([
            'message'=> 'se modifico el producto ' . $id
        ]);
    }

    public function borrar($id){
       $products = Producto::find($id);

       if(!$products){
            return response([
                'message'=> 'Error no se encontro el producto ' . $id
            ],404);
        }

        $products->delete();
        return response([
            'message'=> 'se elimino correctamente el producto ' . $id
        ]);

    }
    private function validationRequest(){
        return['nombre'=>'required|string',
        'precio'=>'required|numeric',
        'cantidad'=>'required|numeric',
        'descripcion'=>'required|string',] ;
    }

}
