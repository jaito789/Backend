<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table = 'tareas';
    use HasFactory;
    protected $fillable = [
        "NombreTarea",
        "Descripcion",
        "FechaInicio",
        "FechaFind",
    ];
}
