<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\UsuarioModel;
use App\Models\ClaseModel;
use App\Models\ReservaModel;
use App\Models\PlanModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Admin extends BaseController
{
    // =========================
    // 🏠 DASHBOARD ADMIN
    // =========================
    public function dashboard_admin()
    {
        $usuarioModel = new UsuarioModel();
        $claseModel = new ClaseModel();
        $reservaModel = new ReservaModel();

        $data = [
            'usuarios' => count($usuarioModel->getAll()),
            'clases' => count($claseModel->getAll()),
            'reservas' => count($reservaModel->getAll()),
        ];

        return view('admin/dashboard', $data);
    }


    // =========================
    // 👥 GESTIÓN DE USUARIOS
    // =========================
    public function usuarios()
    {
        $usuarioModel = new UsuarioModel();
        $planModel = new PlanModel();

        $usuarios = $usuarioModel->findAll();

        foreach ($usuarios as &$usuario) {
            $usuario['plan_pagado'] = 'Sin plan';
            $usuario['clases_restantes'] = 0;

            if (!empty($usuario['plan_id'])) {
                $plan = $planModel->find($usuario['plan_id']);
                if ($plan) {
                    $usuario['plan_pagado'] = $plan['nombre'];
                    $usuario['clases_restantes'] = max(0, $plan['total_clases'] - $usuario['clases_usadas']);
                }
            }
        }

        return view('admin/usuarios', ['usuarios' => $usuarios]);
    }

    public function editar_usuario($id = null)
    {
        $usuarioModel = new UsuarioModel();
        $planModel = new PlanModel();

        $usuario = $usuarioModel->find($id);

        if (!$usuario) {
            throw new PageNotFoundException("Usuario no encontrado");
        }

        $planes = $planModel->findAll();

        return view('admin/editar_usuario', [
            'usuario' => $usuario,
            'planes' => $planes
        ]);
    }

    public function actualizar_usuario($id = null)
    {
        $usuarioModel = new UsuarioModel();

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'cedula' => $this->request->getPost('cedula'),
            'plan_pagado' => $this->request->getPost('plan_pagado'),
            'clases_usadas' => $this->request->getPost('clases_usadas'),
            'clases_restantes' => $this->request->getPost('clases_restantes'),
        ];

        $usuarioModel->update($id, $data);

        return redirect()->to(base_url('admin/usuarios'))->with('mensaje', 'Usuario actualizado correctamente');
    }


    // =========================
    // 📚 GESTIÓN DE CLASES
    // =========================
    public function clases()
    {
        $claseModel = new ClaseModel();
        $clases = $claseModel->findAll();

        return view('admin/clases', ['clases' => $clases]);
    }


    // =========================
    // 🗓️ GESTIÓN DE RESERVAS
    // =========================
    public function reservas()
    {
        $reservaModel = new ReservaModel();
        $reservas = $reservaModel->getAll();

        return view('admin/reservas', ['reservas' => $reservas]);
    }
}
