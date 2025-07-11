<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->where('username !=', 'owner')->findAll();

        return view('user/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah User',
            'user' => null,
            'action' => site_url('user/store'),
            'roles' => [
                1 => 'Admin',
                2 => 'Kasir',
            ]
        ];

        return view('user/form', $data);
    }

    public function store()
    {
        $model = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role_id'  => $this->request->getPost('role_id')
        ];

        $model->insert($data);
        return redirect()->to('/manajemen-user')->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $model = new UserModel();
        $user = $model->find($id);

        $data = [
            'title' => 'Edit User',
            'user' => $user,
            'action' => site_url('user/update/' . $id),
            'roles' => [
                1 => 'Admin',
                2 => 'Kasir',
            ]
        ];

        return view('user/form', $data);
    }

    public function update($id)
    {
        $model = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'role_id'  => $this->request->getPost('role_id')
        ];

        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $model->update($id, $data);
        return redirect()->to('/manajemen-user')->with('success', 'User berhasil diperbarui');
    }
    public function delete($id)
    {
        $model = new UserModel();

        // Cegah jika yang dihapus adalah owner
        $user = $model->find($id);
        if ($user && $user['username'] === 'owner') {
            return redirect()->to('/manajemen-user')->with('error', 'Akun owner tidak boleh dihapus!');
        }

        $model->delete($id);
        return redirect()->to('/manajemen-user')->with('success', 'User berhasil dihapus');
    }
}
