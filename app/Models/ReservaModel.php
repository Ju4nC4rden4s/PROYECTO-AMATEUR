<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservaModel extends Model
{
    protected $table = 'reservas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['usuario_id', 'clase_id', 'fecha_reserva'];
    protected $useTimestamps = false;

    // =========================
    // 📚 OBTENER RESERVAS
    // =========================

    // Todas las reservas con info de usuario y clase
    public function getAll()
    {
        return $this->select('reservas.*, usuarios.nombre as usuario, clases.hora')
                    ->join('usuarios', 'usuarios.id = reservas.usuario_id')
                    ->join('clases', 'clases.id = reservas.clase_id')
                    ->findAll();
    }

    // Reservas de un usuario específico
    public function getByUsuario($id_usuario)
    {
        return $this->select('reservas.*, clases.hora')
                    ->join('clases', 'clases.id = reservas.clase_id')
                    ->where('reservas.usuario_id', $id_usuario)
                    ->findAll();
    }

    // Reservas de una clase específica
    public function getByClase($id_clase)
    {
        return $this->select('reservas.*, usuarios.nombre as usuario')
                    ->join('usuarios', 'usuarios.id = reservas.usuario_id')
                    ->where('reservas.clase_id', $id_clase)
                    ->findAll();
    }

    // =========================
    // 🗓️ GESTIÓN DE RESERVAS
    // =========================

    // Crear nueva reserva
    public function crearReserva($data)
    {
        return $this->insert($data);
    }

    // Cancelar reserva
    public function cancelarReserva($id)
    {
        return $this->delete($id);
    }
}
