<?php namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'id_produk', 'produk', 'email', 'telepon', 'berat', 'jumlah', 'total_harga', 'alamat', 'provinsi', 'kota', 'kurir', 'gambar', 'ongkir', 'status'];
    }