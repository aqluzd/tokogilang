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
        // hanya owner dan admin
        if (!in_array(session()->get('role_id'), [1, 2])) {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak');
        }

        $data['stores'] = $this->storeModel->findAll();
        return view('store/index', $data);
    }

    public function create()
    {
        // hanya owner dan admin
        if (!in_array(session()->get('role_id'), [1, 2])) {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak');
        }

        return view('store/create');
    }

    public function store()
    {
        if (!in_array(session()->get('role_id'), [1, 2])) {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak');
        }

        $this->storeModel->save([
            'name' => $this->request->getPost('name'),
            'address' => $this->request->getPost('address'),
        ]);

        return redirect()->to('/store')->with('success', 'Toko berhasil ditambahkan');
    }
    
    public function edit($id)
    {
        $data['store'] = $this->storeModel->find($id);
        return view('store/edit', $data);
    }

    public function update($id)
    {
        $this->storeModel->update($id, [
            'name' => $this->request->getPost('name')
        ]);

        return redirect()->to('/store')->with('success', 'Toko berhasil diupdate');
    }

    public function delete($id)
    {
        $this->storeModel->delete($id);
        return redirect()->to('/store')->with('success', 'Toko berhasil dihapus');
    }
}
