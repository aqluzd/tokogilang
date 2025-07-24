<?php

namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function doLogin()
    {
        $session = session();
        $model = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $session->set([
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'role_id' => $user['role_id'],
                    'store_id' => $user['store_id'], 
                    'logged_in' => true
                ]);
                return redirect()->to('/dashboard'); 
            } else {
                $session->setFlashdata('error', 'Password salah');
            }
        } else {
            $session->setFlashdata('error', 'Username tidak ditemukan');
        }

        return redirect()->to('/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
