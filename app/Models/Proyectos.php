<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'NombreProyecto', // Nombre del proyecto
        'fuenteFondos', // Fuente de financiación
        'MontoPlanificado', // Monto total planificado
        'MontoPatrocinado', // Monto patrocinado por terceros
        'MontoFondosPropios' // Fondos propios del proyecto
    ];
}
