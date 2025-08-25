<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'store_id', 'supplier_id', 'name', 'sku', 'category',
        'unit', 'purchase_price', 'selling_price', 'description'
    ];

    // Untuk otomatis ambil supplier & store nanti
    protected $useTimestamps = true;
}
