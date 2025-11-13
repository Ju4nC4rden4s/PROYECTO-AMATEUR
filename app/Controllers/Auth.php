<?php
namespace App\Controllers;

use App\Models\PerfilModel;

class Auth extends BaseController
{
    protected $helpers = ['url', 'form'];

    public function index()
    {
        return view('pagina/login');
    }

    public function acceder()
    {
        $usuario = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $perfilModel = new PerfilModel();
        $perfil = $perfilModel->login($usuario, $password);

        if (!$perfil) {
            return redirect()->back()->with('error', 'Credenciales incorrectas');
        }

        // Guardar sesión
        session()->set([
            'id_usuario' => $perfil['id_usuario'],
            'id_rol'     => $perfil['id_rol'],
            'logueado'   => true
        ]);

        // Redirección según rol
        switch ($perfil['id_rol']) {
            case 1: // Admin
            case 2: // Otro rol de admin
                return redirect()->to('/admin/dashboard_admin');

            case 3: // Usuario normal
                return redirect()->to('/usuarios/dashboard');

            default:
                session()->destroy();
                return redirect()->to('/login')->with('error', 'Rol no válido');
        }
    }

    public function salir()
    {
        session()->destroy();
        return redirect()->to('login');
    }

    public function crear_usuario()
    {
        return view('pagina/create_l');
    }
}
