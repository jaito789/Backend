<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\usuarioController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EmpTareaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\EstudianteController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/saludo/{nombre}/{edad}', function ($nombre, $edad) {
    return 'hola mi nombre es:' .$nombre . "y tengo" .$edad;
});

Route::get('/edad/{edad}', function ($edad) {

    if($edad <= 100 && $edad > 0) {

        if($edad > 18){
            return "me gustan de esas edad " .$edad;
        }
            return "eres menor de edad tienes " .$edad;


    }
return "error";

});


////////////////////////USUARIOS/////////////////////
Route::get('/usuarios', [usuarioController::class, 'obtener']);//->middleware('auth:sanctum');
Route::post('/usuarios', [usuarioController::class, 'agregar']);////->middleware('auth:sanctum');
//Route::put('/usuarios/{id}', [usuarioController::class, 'editar']);//->middleware('auth:sanctum');
Route::delete('/usuarios/{id}', [usuarioController::class, 'eliminar']);//->middleware('auth:sanctum');
Route::put('/usuarios/{id}', [usuarioController::class, 'update']);
Route::put('/usuarios/crear/{id}', [usuarioController::class, 'codigo']);
///////////////////////PRODUCTOS///////////////////////
Route::get('/products',[ProductoController::class, "obtener"]);//->middleware('auth:sanctum');
Route::post('/products',[ProductoController::class, "crear"]);//->middleware('auth:sanctum');
Route::put('/products/{id}',[ProductoController::class, "actualizar"]);//->middleware('auth:sanctum');
Route::delete('/products/{id}',[ProductoController::class, "borrar"]);//->middleware('auth:sanctum');
////////////////////////VENTAS//////////////////////////
Route::get('/Venta',[VentaController::class, "obtener"]);//->middleware('auth:sanctum');
Route::post('/Venta',[VentaController::class, "crear"]);//->middleware('auth:sanctum');
Route::put('/Venta/{id}',[VentaController::class, "actualizar"]);//->middleware('auth:sanctum');
Route::delete('/Venta/{id}',[VentaController::class, "delete"]);//->middleware('auth:sanctum');
///////////////////////LOGIN/////////////////////////////
//Route::get('/Login/{email}/{password}',[LoginController::class, "login"]);
Route::post('/Login',[LoginController::class, "login"]);


///////////////////////////EMPLEADOS//////////////////////////////////////////////////////////
Route::get('/empleados',[EmpleadoController::class, 'obtenerEmpleado']);
Route::get('/empleados/{id}',[EmpleadoController::class, 'obtenerunempleado']);
Route::post('/empleado', [EmpleadoController::class, 'agregarEmpleado']);
Route::put('/empleado/{id}', [EmpleadoController::class, 'ModificarEmpleado']);
Route::delete('/empleado/{id}', [EmpleadoController::class, 'eliminarEmpleado']);
////////////////////////////EMPRESAS/////////////////////////////////////////////////////////
Route::get('/empresas',[EmpresaController::class, 'EmpresasObtener']);
Route::get('/empresas/{id}',[EmpresaController::class, 'obtenerunaempresa']);
Route::post('/empresa', [EmpresaController::class, 'AltaEmpresa']);
Route::put('/empresa/modificar/{id}', [EmpresaController::class, 'ModificarEmpresa']);
Route::delete('/empresa/eliminar/{id}', [EmpresaController::class, 'BajaEmpresa']);
/////////////////////////////EMPTAREAS///////////////////////////////////////////////////////

Route::get('/tareas/empresas',[EmpTareaController::class, 'ObtenerTareasEmpresa']);
Route::post('/tarea/empresa',[EmpTareaController::class, 'AgregarTareaEmpresa']);
Route::put('/tarea/empresa/modificar/{id}',[EmpTareaController::class, 'ModificarTareasEmpresa']);
Route::delete('/tarea/{id}',[EmpTareaController::class, 'EliminarTareasEmpresa']);

Route::get('/tareas',[TareaController::class, 'ObtenerTareas']);
Route::get('/tareas/{id}',[TareaController::class, 'obtenerunatarea']);
Route::post('/tarea',[TareaController::class, 'addtarea']);
Route::put('/tarea/modificar/{id}',[TareaController::class, 'ModificarTarea']);
Route::delete('/tarea/eliminar/{id}',[TareaController::class, 'deletetarea']);
//////////////////////////////EMPTAREAS//////////////////////////////////////////////////////////////











//HTTP
//GET obtener
//Post crear
//Put actuzalizar
//Delete eliminar

