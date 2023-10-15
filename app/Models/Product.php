<?php
namespace App\Models;

use CodeIgniter\Model;

class Product extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'kode_barang';
    protected $allowedFields = ['kode_barang', 'nama_barang', 'kode_ukuran', 'kode_warna', 'harga', 'harga_dasar'];
}