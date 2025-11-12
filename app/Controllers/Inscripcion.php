<?php

namespace App\Controllers;
use App\Models\InscripcionModel;
use CodeIgniter\Controller;

class Inscripcion extends Controller
{
    public function index()
    {
        return view('inscripcion');
    }

    public function guardar()
    {
        $model = new InscripcionModel();

        // Campos pendientes de base de datos
        $data = [
            'nombre'     => $this->request->getPost('nombre'),
            'apellidos'  => $this->request->getPost('apellidos'),
            'documento'  => $this->request->getPost('documento'),
            'edad'       => $this->request->getPost('edad'),
            'genero'     => $this->request->getPost('genero'),
            'telefono'   => $this->request->getPost('telefono'),
            'objetivo'   => $this->request->getPost('objetivo'),
            'patologias' => $this->request->getPost('patologias'),
        ];

        // Cuando tengas la BD lista, descomenta esta línea:
        // $model->insert($data);

        return redirect()->to('/inscripcion')->with('mensaje', 'Datos recibidos correctamente (falta guardar en BD)');
    }
}
