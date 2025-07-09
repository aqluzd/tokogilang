<?php

namespace App\Controllers;

use App\Models\UserModel; // <-- Tambahkan ini

class UserController extends BaseController
{
    public function index()
    {
        $model = new UserModel(); // Panggil model
        $data['users'] = $model->findAll(); // Ambil semua data user

        return view('user/index', $data); // Kirim ke view
    }
}
