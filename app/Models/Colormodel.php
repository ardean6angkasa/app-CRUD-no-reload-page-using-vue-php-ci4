<?php
namespace App\Models;

use CodeIgniter\Model;

class Colormodel extends Model
{
    protected $table = 'mst_warna';
    protected $primaryKey = 'kode_warna';
    protected $allowedFields = ['nama_warna', 'kode_warna'];
}