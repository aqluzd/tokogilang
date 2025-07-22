<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'roles'; // sesuaikan nama tabel kamu
    protected $primaryKey = 'id';
    protected $allowedFields = ['role_name']; // sesuaikan kolom yang kamu izinkan
}
