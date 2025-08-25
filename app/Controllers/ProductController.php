<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\SupplierModel;
use App\Models\StoreModel;

class ProductController extends BaseController
{
    protected $productModel;
    protected $supplierModel;
    protected $storeModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->supplierModel = new SupplierModel();
        $this->storeModel   = new StoreModel();
    }

    public function index()
    {
        $products = $this->productModel
            ->select('products.*, suppliers.name as supplier_name, stores.name as store_name')
            ->join('suppliers', 'suppliers.id = products.supplier_id', 'left')
            ->join('stores', 'stores.id = products.store_id')
            ->findAll();

        return view('product/index', [
            'products' => $products
        ]);
    }
    public function create()
    {
        $suppliers = $this->supplierModel->findAll();
        $stores    = $this->storeModel->findAll();

        return view('product/create', [
            'suppliers' => $suppliers,
            'stores'    => $stores
        ]);
    }

    public function store()
    {
        $this->productModel->save([
            'name'          => $this->request->getPost('name'),
            'sku'           => $this->request->getPost('sku'),
            'category'      => $this->request->getPost('category'),
            'unit'          => $this->request->getPost('unit'),
            'purchase_price'=> $this->request->getPost('purchase_price'),
            'selling_price' => $this->request->getPost('selling_price'),
            'description'   => $this->request->getPost('description'),
            'supplier_id'   => $this->request->getPost('supplier_id'),
            'store_id'      => $this->request->getPost('store_id'),
        ]);

        return redirect()->to('/product');
    }

    public function edit($id)
    {
        $product   = $this->productModel->find($id);
        $suppliers = $this->supplierModel->findAll();
        $stores    = $this->storeModel->findAll();

        return view('product/edit', [
            'product'   => $product,
            'suppliers' => $suppliers,
            'stores'    => $stores
        ]);
    }

    public function update($id)
    {
        $this->productModel->update($id, [
            'name'          => $this->request->getPost('name'),
            'sku'           => $this->request->getPost('sku'),
            'category'      => $this->request->getPost('category'),
            'unit'          => $this->request->getPost('unit'),
            'purchase_price'=> $this->request->getPost('purchase_price'),
            'selling_price' => $this->request->getPost('selling_price'),
            'description'   => $this->request->getPost('description'),
            'supplier_id'   => $this->request->getPost('supplier_id'),
            'store_id'      => $this->request->getPost('store_id'),
        ]);

        return redirect()->to('/product');
    }

}
