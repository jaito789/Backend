<?php

namespace App\Models;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empleado extends Model
{


   protected $table = 'empleados';
   use HasFactory;
   protected $fillable = [
    "idEmpresa",
    "NombreEmpleado",
    "DNI",
    "Email",
    "Telefono",
    "Localidad",
    "Direccion",
];
public $timestamps = false;

/* public function empleado(){
    return $this->belongsTo(Empleado::class, 'idEmpresa', 'id');
} */
}
