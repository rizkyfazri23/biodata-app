<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user'; // Nama tabel sesuai dengan yang ada di database
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['username', 'password', 'is_admin'];

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }

    public function createUser($data)
    {
        return $this->insert($data);
    }
}
