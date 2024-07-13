<?php

namespace App\Controllers;

use App\Models\AdminModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginCheck()
    {
        $session = session();
        $adminModel = new AdminModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cari admin berdasarkan username
        $admin = $adminModel->where('username', $username)->first();

        if ($admin) {
            // Verifikasi password tanpa hashing
            if ($password === $admin['password']) {
                // Password benar, set session
                $session->set([
                    'username' => $admin['username'],
                    'logged_in' => true
                ]);
                return redirect()->to('/admin/dashboard');
            } else {
                // Password salah
                return view('login', ['error' => 'Password salah']);
            }
        } else {
            // Username tidak ditemukan
            return view('login', ['error' => 'Username tidak ditemukan']);
        }
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
