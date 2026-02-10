<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function register(){
        return view('auth/register', ['title' => 'Register | FocusHR']);
    }

    public function attemptRegister(){
        $model = new UserModel();
        $model->save([
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password', PASSWORD_DEFAULT)),
            'role' => 'staff'
        ]);
        return redirect()->to('/login')->with('pesan', 'Registration successful!');
    }

    public function login(){
        return view('auth/login', ['title' => 'Login | FocusHR']);
    }

    public function attemptLogin() {
        $model = new UserModel();
        $user = $model->where('email', $this->request->getPost('email'))->first();

        if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
            // Set Session
            session()->set([
                'user_id'  => $user['id'],
                'username' => $user['username'],
                'role'     => $user['role'],
                'isLoggedIn' => true
            ]);
            return redirect()->to('/dashboard');
        }
        return redirect()->back()->with('error', 'Invalid login credentials.');
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/login');
    }
}
