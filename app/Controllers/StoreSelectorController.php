<?php

namespace App\Controllers;

use App\Models\StoreModel;

class StoreSelectorController extends BaseController
{
    public function setActive($id)
    {
        $storeModel = new StoreModel();
        $store = $storeModel->find($id);

        if (!$store) {
            return redirect()->back()->with('error', 'Toko tidak ditemukan.');
        }

        session()->set('active_store_id', $id);
        session()->set('active_store_name', $store['name']);

        return redirect()->to('/product')->with('success', 'Toko aktif diubah ke ' . $store['name']);

    }
}
