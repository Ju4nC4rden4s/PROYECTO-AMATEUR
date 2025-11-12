<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Exceptions\PageNotFoundException;

class UsuarioModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nombre',
        'email',
        'telefono',
        'password',
        'fecha_registro'
    ];
    protected $useTimestamps = false;

    // =========================
    // 📚 OBTENER USUARIOS
    // =========================

    // Todos los usuarios
    public function getAll()
    {
        return $this->findAll();
    }

    // Usuario por ID
    public function getById($id)
    {
        return $this->find($id);
    }

    // Usuario por email
    public function getByEmail($email)
    {
        return $this->where('email', $email)->first();
    }


    // =========================
    // ✏️ GESTIÓN DE USUARIOS
    // =========================

    // Crear usuario
    public function createUsuario($data)
    {
        return $this->insert($data);
    }

    // Actualizar usuario
    public function updateUsuario($id, $data)
    {
        return $this->update($id, $data);
    }

    // Eliminar usuario
    public function deleteUsuario($id)
    {
        return $this->delete($id);
    }


    // =========================
    // 👤 PERFIL DE USUARIO
    // =========================
    public function perfil()
    {
        // Supongamos que el ID del usuario está en sesión
        $id = session()->get('id_usuario');

        if (!$id) {
            return redirect()->to(base_url('login'));
        }

        $usuario = $this->find($id);

        if (!$usuario) {
            throw new PageNotFoundException("Usuario no encontrado");
        }

        return view('usuarios/perfil', ['usuario' => $usuario]);
    }
}
