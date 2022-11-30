<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';
    use HasFactory;
    protected $fillable = [
        "CIF",
        "NombreEmpresa",
        "Localidad",
        "Direccion",
        "Email",
        "DireccionWeb",
        "Telefono",
    ];
}
