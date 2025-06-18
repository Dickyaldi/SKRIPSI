<?php namespace App\Models;

use CodeIgniter\Model;

class SkripsiModel extends Model
{
    protected $table = 'skripsi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['mahasiswa_id', 'judul', 'file', 'status', 'created_at'];
}
