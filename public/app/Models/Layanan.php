<?php

namespace App\Models;

use CodeIgniter\Model;

class Layanan extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'layanan';
    protected $primaryKey       = 'layanan_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $allowedFields = ['jenis_layanan', 'estimasi_waktu', 'tarif'];
}
