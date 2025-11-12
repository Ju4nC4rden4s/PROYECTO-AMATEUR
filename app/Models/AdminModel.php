<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Exceptions\PageNotFoundException;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $allowedFields = ['usuario', 'password', 'nombre'];
    protected $useTimestamps = false;

    // =========================
    // 🔑 OBTENER ADMIN POR USUARIO
    // =========================
    public function getByUsuario($usuario)
    {
        return $this->where('usuario', $usuario)->first();
    }

    // =========================
    // 🔑 LOGIN DE ADMIN
    // =========================
    public function login($usuario, $password)
    {
        $admin = $this->where('usuario', $usuario)->first();
        if ($admin && $admin['password'] === $password) {
            return $admin;
        }
        return null;
    }

    // =========================
    // 👤 ELIMINAR USUARIO (ADMIN)
    // =========================
    public function eliminar_usuario($id)
    {
        $usuarioModel = new \App\Models\UsuarioModel();
        return $usuarioModel->delete($id);
    }

    // =========================
    // ✏️ EDITAR USUARIO (FORMULARIO)
    // =========================
    public function editar_usuario($id)
    {
        $usuarioModel = new \App\Models\UsuarioModel();
        $usuario = $usuarioModel->find($id);

        if (!$usuario) {
            throw new PageNotFoundException("Usuario no encontrado");
        }

        return $usuario;
    }
}
