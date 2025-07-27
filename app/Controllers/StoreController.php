<?php

namespace App\Controllers;

use App\Models\StoreModel;

class StoreController extends BaseController
{
    protected $storeModel;

    public function __construct()
    {
        $this->storeModel = new StoreModel();
    }

    public function index()
    {
        // Hanya untuk role owner & admin
        if (!in_array(session()->get('role_id'), [1, 2])) {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak');
        }

        $data = [
            'title' => 'Manajemen Toko',
            'stores' => $this->storeModel->findAll()
        ];

        return view('store/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Toko',
            'action' => site_url('/store/store')
        ];

        return view('store/form', $data);
    }

    public function store()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'name' => 'required',
            'address' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }

        $this->storeModel->insert([
            'name' => $this->request->getPost('name'),
            'address' => $this->request->getPost('address')
        ]);

        return redirect()->to('/store')->with('success', 'Toko berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $store = $this->storeModel->find($id);

        if (!$store) {
            return redirect()->to('/store')->with('error', 'Toko tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit Toko',
            'store' => $store,
            'action' => site_url('/store/update/' . $id)
        ];

        return view('store/form', $data);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();

        $rules = [
            'name' => 'required',
            'address' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }

        $this->storeModel->update($id, [
            'name' => $this->request->getPost('name'),
            'address' => $this->request->getPost('address')
        ]);

        return redirect()->to('/store')->with('success', 'Toko berhasil diperbarui.');
    }

    public function delete($id)
    {
        $store = $this->storeModel->find($id);

        if (!$store) {
            return redirect()->to('/store')->with('error', 'Toko tidak ditemukan.');
        }

        $this->storeModel->delete($id);

        return redirect()->to('/store')->with('success', 'Toko berhasil dihapus.');
    }
}
