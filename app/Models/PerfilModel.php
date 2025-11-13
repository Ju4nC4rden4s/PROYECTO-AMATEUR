<?php

namespace App\Models;

use CodeIgniter\Model;

class PerfilModel extends Model
{
    protected $table = 'perfil';
    protected $primaryKey = 'id_perfil';
    protected $allowedFields = [
        'nombre_usuario',
        'contraseña',
        'id_rol',
        'id_usuario'
    ];

    /**
     * Valida el login por usuario y contraseña
     */
    public function login($usuario, $password)
    {
        return $this->where('nombre_usuario', $usuario)
                    ->where('contraseña', $password)
                    ->first();
    }
}
