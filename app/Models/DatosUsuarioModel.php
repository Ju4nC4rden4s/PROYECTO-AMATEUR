<?php

namespace App\Models;

use CodeIgniter\Model;

class DatosUsuarioModel extends Model
{
    protected $table = 'datos_usuarios';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = [
        'cedula',
        'nombre',
        'apellido',
        'correo',
        'direccion',
        'telefono',
        'genero'
    ];
}
