<?php

namespace App\Http\Controllers;

use App\Models\Emp_tarea;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmpTareaController extends Controller
{
    public function ObtenerTareasEmpresa(){
        //$tareas = Emp_tarea::all();
        //$datos=$request->validate($this->validationRequest());

        $tareas = Emp_tarea::join('empleados','emp_tareas.idEmpleado','=','empleados.id')
        ->join('tareas','emp_tareas.idTarea','=','tareas.id')
        ->select(
            'emp_tareas.*',
            'empleados.NombreEmpleado',
            'Tareas.NombreTarea'
         )
        ->get();

        return $tareas;
    }

    public function AgregarTareaEmpresa(Request $request){
        $datos=$request->validate($this->validationRequest());
        $tarea = Emp_tarea::create($datos);

        return response([
            'message'=> 'Se creo la tarea del empleado con exito',
            'id'=> $tarea['id']
        ], 201);

    }

    public function ModificarTareasEmpresa($id, Request $request){
        $tarea = Emp_tarea::find($id);
        if(!$tarea){
            return response([
                'message'=>'Error, no se enccontro la tarea del empleado ' . $id,
            ], 404);
        }
        $datos=$request->validate($this->validationRequest());


        $tarea->update($datos);

        return response([
            'message'=> 'se modifico la tarea del empleado ' . $id
        ]);
    }
    public function EliminarTareasEmpresa($id){
        $tarea = Emp_tarea::find($id);

        if(!$tarea){
             return response([
                 'message'=> 'Error no se encontro la tarea del empleado ' . $id
             ],404);
         }

         $tarea->delete();
         return response([
             'message'=> 'se elimino la tarea del empleado correctamente' . $id
         ]);

     }



    private function validationRequest(){
        return[
            'idEmpleado'=>'required|numeric|exists:empleados,id',
            'idTarea'=>'required|numeric|exists:tareas,id',
    ];
    }
}
