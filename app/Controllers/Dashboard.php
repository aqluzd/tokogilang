<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'username' => session()->get('username'),
            'role_id'  => session()->get('role_id')
        ];

        return view('dashboard', $data);
    }
}
