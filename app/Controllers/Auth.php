<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        // Inisialisasi model di constructor agar bisa dipakai di semua fungsi
        $this->userModel = new UserModel();
    }

    // 1. Menampilkan Halaman Login
    public function login()
    {
        // Jika sudah login, langsung lempar ke dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }

        return view('Auth/login', [
            'title' => 'Login | FocusHR'
        ]);
    }

    // 2. Proses Verifikasi Login
    public function attemptLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('email', $email)->first();

        if ($user) {
            // Verifikasi Password Hash
            if (password_verify($password, $user['password'])) {
                
                // MENGATUR SESSION (Kunci utama agar tidak redirect loop)
                $sessionData = [
                    'id'         => $user['id'],
                    'username'   => $user['username'],
                    'email'      => $user['email'],
                    'role'       => $user['role'],
                    'isLoggedIn' => true, // Pastikan nama key ini sama dengan di AuthFilter
                ];
                session()->set($sessionData);

                return redirect()->to('/dashboard');
            } else {
                return redirect()->back()->with('error', 'Password salah.');
            }
        } else {
            return redirect()->back()->with('error', 'Email tidak terdaftar.');
        }
    }

    // 3. Menampilkan Halaman Register
    public function register()
    {
        return view('Auth/register', [
            'title' => 'Register | FocusHR'
        ]);
    }

    // 4. Proses Pendaftaran User Baru
    public function attemptRegister()
    {
        // Validasi input
        $rules = [
            'username'         => 'required|min_length[3]|is_unique[users.username]',
            'email'            => 'required|valid_email|is_unique[users.email]',
            'password'         => 'required|min_length[6]',
            'password_confirm' => 'matches[password]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan ke Database
        $this->userModel->save([
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => 'staff' // Default role
        ]);

        return redirect()->to('/login')->with('pesan', 'Registrasi berhasil! Silakan login.');
    }

    // 5. Proses Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}