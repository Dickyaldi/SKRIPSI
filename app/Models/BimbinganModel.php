<?php namespace App\Models;

use CodeIgniter\Model;

class BimbinganModel extends Model
{
    protected $table = 'bimbingan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['skripsi_id', 'tanggal', 'catatan', 'status', 'file'];
}
