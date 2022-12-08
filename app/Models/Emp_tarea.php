<?php

namespace App\Models;

use App\Models\Tarea;
use App\Models\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Emp_tarea extends Model
{
    protected $table = 'emp_tareas';
    use HasFactory;
    protected $fillable = [
        "idEmpleado",
        "idTarea",

    ];

    public function empleado(){
        return $this->belongsTo(Empleado::class, 'idEmpresa', 'id');
    }
    public function tarea(){
        return $this->belongsTo(Tarea::class, 'idTarea', 'id');
    }

}
