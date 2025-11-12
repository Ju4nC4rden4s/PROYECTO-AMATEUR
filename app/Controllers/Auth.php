<?php
namespace App\Controllers;
//use App\Models\UsuarioModel;

class Auth extends BaseController
{
    protected $helpers = ['url', 'form'];

    public function index()
    {
        return view('pagina/login');
    }

   /* public function acceder()
    {
        $username = trim($this->request->getPost('username'));
        $password = (string) $this->request->getPost('password');

        $model = new UsuarioModel();
        $user  = $model->where('username', $username)->first();

        if (!$user || !password_verify($password, $user['password_hash'])) {
            return redirect()->back()->withInput()->with('error', 'Usuario o contraseña incorrectos.');
        }

        session()->set([
            'uid'      => $user['id'],
            'username' => $user['username'],
            'isLogged' => true,
        ]);

        return redirect()->to(site_url('empleados')); // página de inicio tras login
    }*/

    public function salir()
    {
        session()->destroy();
        return redirect()->to(site_url('login'));
    }

    public function crear_usuario()
    {
        return view('pagina/create_l');

    }
}
