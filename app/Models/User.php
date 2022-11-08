<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'user';
    // protected $primaryKey       = 'user_id';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $allowedFields    = ['nama', 'email', 'username', 'password', 'role'];
<<<<<<< HEAD
=======
    protected $useTimestamps = true;
>>>>>>> 5dcbec202b6a21da831f460619e6ad883d9563cd

    public function getUser($username = false)
    {
        if ($username == false) {
            return $this->orderBy('role', 'ASC')->findAll();
        }

        return $this->where('username', $username)->first();
    }
}
