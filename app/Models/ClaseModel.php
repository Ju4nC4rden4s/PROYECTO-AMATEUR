<?php

namespace App\Models;

use CodeIgniter\Model;

class ClaseModel extends Model
{
    protected $table = 'clases';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nombre',
        'descripcion',
        'dia_semana',
        'hora_inicio',
        'hora_fin',
        'cupo_maximo',
        'cupo_disponible',
        'estado'
    ];
    protected $useTimestamps = false;

    // =========================
    // 📚 OBTENER CLASES
    // =========================
    // Todas las clases
    public function getAll()
    {
        return $this->findAll();
    }

    // Obtener clase por ID
    public function getById($id)
    {
        return $this->find($id);
    }

    // Clases con cupos disponibles
    public function getDisponibles()
    {
        return $this->where('cupo_disponible >', 0)->findAll();
    }

    // =========================
    // 🗓️ GESTIÓN DE CUPOS
    // =========================
    // Reducir un cupo al reservar
    public function reducirCupo($id)
    {
        $clase = $this->find($id);
        if ($clase && $clase['cupo_disponible'] > 0) {
            $clase['cupo_disponible']--;
            return $this->update($id, $clase);
        }
        return false;
    }

    // Incrementar cupo si se cancela
    public function incrementarCupo($id)
    {
        $clase = $this->find($id);
        if ($clase && $clase['cupo_disponible'] < $clase['cupo_maximo']) {
            $clase['cupo_disponible']++;
            return $this->update($id, $clase);
        }
        return false;
    }
}
