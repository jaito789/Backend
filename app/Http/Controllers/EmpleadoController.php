<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class EmpleadoController extends Controller
{
    public function obtenerEmpleado(){
        //$empleados = Empleado::all();
        $empleados = Empleado::join('empresas','empleados.idEmpresa','=','empresas.id')
        ->select(
            'empleados.*',
            'empresas.id as idEmpresa'
        )
        ->get();
        //$empleados = Empleado::with('empresa')->get();
        return $empleados;
    }
    public function obtenerunempleado($id){

        $empleados = Empleado::find($id);
        if(!$empleados){
            return response([
                'message'=>'Error, no se encontro el empleado ' . $id,
            ], 404);
        }
        return $empleados;
    }

    public function agregarEmpleado(Request $request){
        $datos=$request->validate($this->validationRequest());


        $empleados = Empleado::create($datos);

        return response([
            'message'=> 'Se creo con exito el empleado',
            'id'=> $empleados['id']
        ], 201);
    }

    public function ModificarEmpleado($id, Request $request){
        $empleado = Empleado::find($id);
        if(!$empleado){
            return response([
                'message'=>'Error, no se encontro el empleado ' . $id,
            ], 404);
        }
        $datos=$request->validate($this->validationRequest());


        $empleado->update($datos);

        return response([
            'message'=> 'se modifico el empleado ' . $id
        ]);
    }
    public function eliminarEmpleado($id){
        $empleado = Empleado::find($id);

        if(!$empleado){
             return response([
                 'message'=> 'Error no se encontro el empleado ' . $id
             ],404);
         }

         $empleado->delete();
         return response([
             'message'=> 'se elimino correctamente el empleado ' . $id
         ]);

     }

    private function validationRequest(){
        return
        [
            'idEmpresa'=>'required|numeric',
            'NombreEmpleado'=>'required|string',
            'DNI'=>'required|string',
            'Email'=>'required|email',
            'Telefono'=>'required|string',
            'Localidad'=>'required|string',
            'Direccion'=>'required|string',
        ];
    }
}
