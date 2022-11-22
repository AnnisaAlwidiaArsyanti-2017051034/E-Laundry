<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Layanan;

class Transaksi extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'transaksi';
    protected $primaryKey       = 'id_transaksi';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $allowedFields    = ['no_invoice','nama_pelanggan', 'nomor_tlp_pelanggan', 'alamat_pelanggan', 'tanggal_masuk', 'berat', 'layanan', 'tanggal_keluar', 'biaya', 'status_pembayaran', 'status_pengambilan'];
    protected $dateFormat    = 'date';

    public function getLayanan()
    {             
        $query =  $this->db->table('transaksi')
         ->join('layanan', 'transaksi.layanan = layanan.layanan_id')
         ->orderBy('id_transaksi', 'DESC')->get();  
        return $query;
    }
    public function getTotalDay($day){
        $query =  $this->db->table('transaksi')->select('SUM(biaya) as total')->where('tanggal_masuk',$day)->get()->getResultArray();
        return $query;
    }

    public function getTotalMont($mont){
        $query =  $this->db->table('transaksi')->select('SUM(biaya) as total')->where('EXTRACT(YEAR_MONTH FROM tanggal_masuk)',$mont)->get()->getResultArray();
        return $query;
    }
    public function getTotalYear($year){
        $query =  $this->db->table('transaksi')->select('SUM(biaya) as total')->where('EXTRACT(YEAR FROM tanggal_masuk)',$year)->get()->getResultArray();
        return $query;
    }
    public function getTotalSelamaIni(){
        $query =  $this->db->table('transaksi')->select('SUM(biaya) as total')->get()->getResultArray();
        return $query;
    }
    public function getInvoice(){
        $query = $this->db->table('transaksi')->select ('MAX(id_transaksi) as kodeTerbesar')->get()->getResultArray();
        return $query;
    }
}