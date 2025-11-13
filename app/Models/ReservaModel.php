<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservaModel extends Model
{
    protected $table = 'reservas';
    protected $primaryKey = 'id_reservas';
    protected $allowedFields = ['id_usuario', 'id_clases', 'fecha_reserva'];
    protected $useTimestamps = false;

    // =========================
    // 📚 OBTENER RESERVAS
    // =========================

    /**
     * Obtener todas las reservas con info de usuario y clase
     */
    public function getAll()
    {
        return $this->select('reservas.*, 
                              datos_usuarios.nombre as usuario, 
                              clases.nombre as clase, 
                              clases.hora_inicio, 
                              clases.hora_fin')
                    ->join('datos_usuarios', 'datos_usuarios.id_usuario = reservas.id_usuario')
                    ->join('clases', 'clases.id_clases = reservas.id_clases')
                    ->findAll();
    }

    /**
     * Obtener reservas de un usuario específico
     */
    public function getByUsuario($id_usuario)
    {
        return $this->select('reservas.*, 
                              clases.nombre as clase, 
                              clases.hora_inicio, 
                              clases.hora_fin')
                    ->join('clases', 'clases.id_clases = reservas.id_clases')
                    ->where('reservas.id_usuario', $id_usuario)
                    ->findAll();
    }

    /**
     * Obtener reservas de una clase específica
     */
    public function getByClase($id_clases)
    {
        return $this->select('reservas.*, datos_usuarios.nombre as usuario')
                    ->join('datos_usuarios', 'datos_usuarios.id_usuario = reservas.id_usuario')
                    ->where('reservas.id_clases', $id_clases)
                    ->findAll();
    }

    // =========================
    // 🗓️ GESTIÓN DE RESERVAS
    // =========================

    /**
     * Crear nueva reserva
     */
    public function crearReserva($data)
    {
        return $this->insert($data);
    }

    /**
     * Cancelar reserva
     */
    public function cancelarReserva($id_reservas)
    {
        return $this->delete($id_reservas);
    }
}
