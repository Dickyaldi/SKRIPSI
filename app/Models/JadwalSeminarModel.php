<?php namespace App\Models;

use CodeIgniter\Model;

class JadwalSeminarModel extends Model
{
    protected $table = 'jadwal_seminar';
    protected $primaryKey = 'id';
    protected $allowedFields = ['skripsi_id', 'jenis', 'tanggal', 'tempat'];
}
