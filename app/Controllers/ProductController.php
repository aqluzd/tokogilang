<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\StoreModel;

class ProductController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $storeModel   = new StoreModel();

        $roleId = session()->get('role_id');
        $activeStoreId = session()->get('active_store_id');

        if (in_array($roleId, [1, 2])) {
            // Owner & Admin → bisa ganti store
            if (!$activeStoreId) {
                // Kalau belum pilih toko → default ambil toko pertama
                $firstStore = $storeModel->first();
                if ($firstStore) {
                    $activeStoreId = $firstStore['id'];
                    session()->set('active_store_id', $activeStoreId);
                }
            }
        } else {
            // Kasir → hanya toko sesuai session
            if (!$activeStoreId) {
                return redirect()->to('/store/setActive/' . session()->get('store_id'));
            }
        }

        // Ambil produk sesuai store
        $products = $productModel->where('store_id', $activeStoreId)->findAll();

        return view('product/index', [
            'products' => $products,
            'stores'   => $storeModel->findAll(),
            'activeStoreId' => $activeStoreId,
        ]);
    }
}
