<?php

namespace App\Models;

use CodeIgniter\Model;

class Transaksi extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'transaksi';
    protected $primaryKey       = 'no_invoice';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $allowedFields    = ['nama_pelanggan', 'nomor_tlp_pelanggan', 'alamat_pelanggan', 'berat', 'layanan', 'status_pembayaran', 'status pengambilan'];

    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tanggal_masuk';
}