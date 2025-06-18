<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';      // Nama tabel database
    protected $primaryKey = 'id';         // Kolom primary key

    // Kolom yang boleh dimasukkan saat insert/update
    protected $allowedFields = ['nama', 'email', 'password'];

    // (Opsional) Jika tabel punya kolom created_at, updated_at
    // protected $useTimestamps = true;
}
