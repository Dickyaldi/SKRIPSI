<?php namespace App\Controllers;

use App\Models\SkripsiModel;
use App\Models\MahasiswaModel;
use App\Models\BimbinganModel;

class Monitoring extends BaseController
{
    public function index()
    {
        $skripsiModel = new SkripsiModel();
        $mahasiswaModel = new MahasiswaModel();
        $bimbinganModel = new BimbinganModel();

        $skripsiList = $skripsiModel->findAll();

foreach ($skripsiList as &$s) {
    $mahasiswa = $mahasiswaModel->find($s['mahasiswa_id']);

    if ($mahasiswa) {
        $s['mahasiswa'] = $mahasiswa['nama'];
        $s['nim'] = $mahasiswa['nim'];
    } else {
        $s['mahasiswa'] = '[Data tidak ditemukan]';
        $s['nim'] = '-';
    };
   $s['bimbingan_count'] = $bimbinganModel->where('skripsi_id', $s['id'])->countAllResults();

    $lastBimbingan = $bimbinganModel
        ->where('skripsi_id', $s['id'])
        ->orderBy('tanggal', 'DESC')
        ->first();

    $s['last_status'] = $lastBimbingan['status'] ?? '-';

            $s['last_status'] = $bimbinganModel->where('skripsi_id', $s['id'])->orderBy('tanggal', 'DESC')->first()['status'] ?? '-';
        }

        return view('monitoring/index', ['data' => $skripsiList]);
    }
}
