<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Models\ClaseModel;
use App\Models\ReservaModel;

class Usuario extends BaseController
{
    // =========================
    // 🏠 DASHBOARD USUARIO
    // =========================
    public function dashboard_usuario()
    {
        $usuarioModel = new UsuarioModel();
        $reservaModel = new ReservaModel();

        // Usuario temporal (hasta implementar login)
        $idUsuario = 1;
        $usuario = $usuarioModel->getById($idUsuario);
        $clases = $reservaModel->getByUsuario($idUsuario);

        $data = [
            'usuario' => $usuario,
            'clasesActivas' => count($clases)
        ];

        return view('usuarios/dashboard', $data);
    }


    // =========================
    // 📚 MIS CLASES
    // =========================
    public function mis_clases()
    {
        //$reservaModel = new ReservaModel();
        //$id_usuario = session()->get('id_usuario');

        //if (!$id_usuario) {
            //return redirect()->to(base_url('login'));
        //}

        //$clases = $reservaModel->getByUsuario($id_usuario);

        return view('usuarios/mis_clases'); //, ['clases' => $clases]);
    }


    // =========================
    // 🗓️ RESERVAR NUEVAS CLASES
    // =========================
    public function reservar()
    {
        $claseModel = new ClaseModel();
        $clases = $claseModel->getDisponibles();

        return view('usuarios/reservar', ['clases' => $clases]);
    }


    // =========================
    // 👤 PERFIL DEL USUARIO
    // =========================
    public function perfil()
{
    $usuarioModel = new \App\Models\UsuarioModel();

    // Obtener ID del usuario desde sesión
    $id_usuario = session()->get('id_usuario');

    if (!$id_usuario) {
        // Redirigir a login si no hay sesión
        return redirect()->to(base_url('login'));
    }

    // Obtener usuario desde BD
    $usuario = $usuarioModel->getById($id_usuario);

    if (!$usuario) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Usuario no encontrado');
    }

    return view('usuarios/perfil', ['usuario' => $usuario]);
}

}
