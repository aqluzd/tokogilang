<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'store_id',
        'name',
        'buy_price',
        'sell_price',
        'stock',
    ];

    protected $useTimestamps = true;
}
