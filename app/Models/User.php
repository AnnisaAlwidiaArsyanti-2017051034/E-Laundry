<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'users';
    // protected $primaryKey       = 'user_id';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $allowedFields    = ['email','username','password_hash','updated_at'];

}
