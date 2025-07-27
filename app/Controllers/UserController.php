<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\StoreModel;
use App\Models\RoleModel;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->getUsersWithRole();

        return view('user/index', $data);
    }

    public function create()
    {
        $storeModel = new \App\Models\StoreModel();
        $roleModel = new \App\Models\RoleModel();

        $rolesRaw = $roleModel->findAll();
        $roles = [];

        foreach ($rolesRaw as $r) {
            $roles[$r['id']] = $r['role_name'];
        }
        unset($roles[1]);
        $data = [
            'title' => 'Tambah User',
            'action' => site_url('user/store'),
            'stores' => $storeModel->findAll(),
            'roles'  => $roles
        ];

        return view('user/form', $data);
    }


    public function store()
    {
        $userModel = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'name'     => $this->request->getPost('name'),
            'role_id'  => $this->request->getPost('role_id'),
            'store_id' => $this->request->getPost('store_id'),
            'status'   => $this->request->getPost('status')
        ];

        // Cek apakah username sudah ada
        $existing = $userModel->where('username', $data['username'])->first();
        if ($existing) {
            return redirect()->back()->withInput()->with('error', 'Username sudah digunakan!');
        }

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $userModel->insert($data);

        return redirect()->to('/user')->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $userModel = new UserModel();
        $storeModel = new StoreModel();
        $roleModel = new RoleModel();

        $user = $userModel->find($id);

        // Mapping roles ke bentuk [id => role_name]
        $rolesRaw = $roleModel->findAll();
        $roles = [];
        foreach ($rolesRaw as $r) {
            $roles[$r['id']] = $r['role_name']; 
        }

        $data = [
            'title'  => 'Edit User',
            'user'   => $user,
            'action' => site_url('user/update/' . $id),
            'roles'  => $roles,
            'stores' => $storeModel->findAll(),
        ];

        return view('user/form', $data);
    }


    public function update($id)
    {
        $model = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'name'     => $this->request->getPost('name'),
            'role_id'  => $this->request->getPost('role_id'),
            'store_id' => $this->request->getPost('store_id'),
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
