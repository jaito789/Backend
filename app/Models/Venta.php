<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';
    use HasFactory;
    protected $fillable = [
        "id_usuario",
        "id_producto",
        "fecha_venta",

    ];
}
