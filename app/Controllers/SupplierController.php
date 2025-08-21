<?php

namespace App\Controllers;

use App\Models\SupplierModel;

class SupplierController extends BaseController
{
    protected $supplierModel;

    public function __construct()
    {
        $this->supplierModel = new SupplierModel();
    }

    private function checkAccess()
    {
        $roleId = session()->get('role_id');
        if (!in_array($roleId, [1, 2])) { // 1 = Owner, 2 = Admin
            return redirect()->to('/dashboard')->with('error', 'Anda tidak punya akses ke halaman ini.');
        }
    }

    public function index()
    {
        if ($redirect = $this->checkAccess()) return $redirect;

        $data['suppliers'] = $this->supplierModel->findAll();
        return view('supplier/index', $data);
    }

    public function create()
    {
        if ($redirect = $this->checkAccess()) return $redirect;

        return view('supplier/create');
    }

    public function store()
    {
        if ($redirect = $this->checkAccess()) return $redirect;

        $this->supplierModel->save([
            'name'    => $this->request->getPost('name'),
            'contact' => $this->request->getPost('contact'),
            'address' => $this->request->getPost('address'),
        ]);

        return redirect()->to('/supplier')->with('success', 'Supplier berhasil ditambahkan');
    }

    public function edit($id)
    {
        if ($redirect = $this->checkAccess()) return $redirect;

        $data['supplier'] = $this->supplierModel->find($id);
        return view('supplier/edit', $data);
    }

    public function update($id)
    {
        if ($redirect = $this->checkAccess()) return $redirect;

        $this->supplierModel->update($id, [
            'name'    => $this->request->getPost('name'),
            'contact' => $this->request->getPost('contact'),
            'address' => $this->request->getPost('address'),
        ]);

        return redirect()->to('/supplier')->with('success', 'Supplier berhasil diperbarui');
    }

    public function delete($id)
    {
        if ($redirect = $this->checkAccess()) return $redirect;

        $this->supplierModel->delete($id);
        return redirect()->to('/supplier')->with('success', 'Supplier berhasil dihapus');
    }
}
