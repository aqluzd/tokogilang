<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\StoreModel;

class ProductController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();

        $storeId = session()->get('active_store_id');
        $products = $productModel->where('store_id', $storeId)->findAll();

        return view('product/index', [
            'title' => 'Daftar Produk',
            'products' => $products
        ]);
        if (!$storeId) {
            return redirect()->to('/')->with('error', 'Silakan pilih toko terlebih dahulu.');
        }   
    }

    public function create()
    {
        return view('product/form', [
            'title' => 'Tambah Produk',
            'action' => site_url('product/store')
        ]);
    }

    public function store()
    {
        $productModel = new ProductModel();

        $productModel->insert([
            'store_id'   => session()->get('active_store_id'),
            'name'       => $this->request->getPost('name'),
            'buy_price'  => $this->request->getPost('buy_price'),
            'sell_price' => $this->request->getPost('sell_price'),
            'stock'      => $this->request->getPost('stock'),
        ]);

        return redirect()->to('/product')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($id);

        return view('product/form', [
            'title'  => 'Edit Produk',
            'action' => site_url('product/update/' . $id),
            'product' => $product
        ]);
    }

    public function update($id)
    {
        $productModel = new ProductModel();

        $productModel->update($id, [
            'name'       => $this->request->getPost('name'),
            'buy_price'  => $this->request->getPost('buy_price'),
            'sell_price' => $this->request->getPost('sell_price'),
            'stock'      => $this->request->getPost('stock'),
        ]);

        return redirect()->to('/product')->with('success', 'Produk berhasil diperbarui');
    }

    public function delete($id)
    {
        $productModel = new ProductModel();
        $productModel->delete($id);

        return redirect()->to('/product')->with('success', 'Produk berhasil dihapus');
    }
}
