<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Layanan;

class Transaksi extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'transaksi';
    protected $primaryKey       = 'no_invoice';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $allowedFields    = ['nama_pelanggan', 'nomor_tlp_pelanggan', 'alamat_pelanggan', 'tanggal_masuk', 'berat', 'layanan', 'tanggal_keluar', 'biaya', 'status_pembayaran', 'status_pengambilan'];
    protected $dateFormat    = 'date';

    public function getLayanan()
    {             
        $query =  $this->db->table('transaksi')
         ->join('layanan', 'transaksi.layanan = layanan.layanan_id')
         ->get();  
        return $query;
    }
    public function getTransaksi()
    {             
        $query =  $this->db->table('transaksi')
         ->get();  
        return $query;
    }
    // public function getTransaksiHariIni(){
    //     $hariini = date("Y-m-d");
    //     return $this->db->get_where('transaksi', array('tanggal_masuk', $hariini));
    // }
}