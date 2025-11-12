<?php

namespace App\Models;

use CodeIgniter\Model;

class PlanModel extends Model
{
    protected $table = 'planes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'descripcion', 'precio', 'total_clases', 'duracion_dias', 'estado'];
    protected $useTimestamps = false;
}
