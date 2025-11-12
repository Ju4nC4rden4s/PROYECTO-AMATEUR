<?php

namespace App\Models;
use CodeIgniter\Model;

class InscripcionModel extends Model
{
    protected $table = 'inscripciones'; // ← Nombre de la tabla en tu futura BD
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nombre', 'apellidos', 'documento', 'edad', 'genero', 'telefono', 'objetivo', 'patologias'
    ];
}
