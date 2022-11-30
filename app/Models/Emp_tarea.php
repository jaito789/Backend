<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emp_tarea extends Model
{
    protected $table = 'emp_tareas';
    use HasFactory;
    protected $fillable = [
        "idEmpleado",
        "idTarea",

    ];
}
