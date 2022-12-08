<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TareaController extends Controller
{
    public function ObtenerTareas(){
        $tareas = Tarea::all();
        return $tareas;
    }
    public function obtenerunatarea($id){
                $tarea = Tarea::find($id);
        if(!$tarea){
            return response([
                'message'=>'Error, no se encontro la tarea ' . $id,
            ], 404);
        }
        return $tarea;
    }

    public function addtarea(Request $request){
        $datos=$request->validate($this->validationRequest());

        $tarea = Tarea::create($datos);

        return response([
            'message'=> 'Se creo la tarea con exito',
            'id'=> $tarea['id']
        ], 201);
    }

    public function ModificarTarea($id, Request $request){
        $tarea = Tarea::find($id);
        if(!$tarea){
            return response([
                'message'=>'Error, no se enccontro la tarea con el id ' . $id,
            ], 404);
        }
        $datos=$request->validate($this->validationRequest());


        $tarea->update($datos);

        return response([
            'message'=> 'se modifico la tarea ' . $id
        ]);
    }
    public function deletetarea($id){
        $tarea = Tarea::find($id);

        if(!$tarea){
             return response([
                 'message'=> 'Error no se encontro la tarea con el id' . $id
             ],404);
         }

         $tarea->delete();
         return response([
             'message'=> 'se elimino la tarea correctamente' . $id
         ]);

     }



    private function validationRequest(){
        return[
        'NombreTarea'=>'required|string',
        'Descripcion'=>'required|string',
        'FechaInicio'=>'required|date',
        'FechaFind'=>'required|date',
    ];
    }
}
