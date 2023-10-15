<?php
namespace App\Models;

use CodeIgniter\Model;

class Productmodel extends Model
{
    protected $table = 'mst_ukuran';
    protected $primaryKey = 'kode_ukuran';
    protected $allowedFields = ['ukuran', 'kode_ukuran'];
}