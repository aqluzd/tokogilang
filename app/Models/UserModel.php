<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'name', 'role_id', 'store_id', 'status'];
    protected $returnType = 'array';


    public function getUsersWithRole()
    {
        return db_connect()->table('users')
            ->select('users.*, roles.role_name')
            ->join('roles', 'roles.id = users.role_id')
            ->where('users.username !=', 'owner')
            ->get()
            ->getResult(); // GUNAKAN getResult() untuk hasil berbentuk object
    }

}
