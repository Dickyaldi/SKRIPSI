<?php namespace App\Controllers;

use App\Models\SkripsiModel;
use App\Models\MahasiswaModel;
use App\Models\DosenModel;
use App\Models\BimbinganModel;
use App\Models\JadwalSeminarModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();
        $role = $session->get('role');
        $user = $session->get('user');

        $data = [
            'total_mahasiswa' => (new MahasiswaModel())->countAll(),
            'total_dosen'     => (new DosenModel())->countAll(),
            'total_skripsi'   => (new SkripsiModel())->countAll(),
            'total_bimbingan' => (new BimbinganModel())->countAll(),
            'total_seminar'   => (new JadwalSeminarModel())->countAll(),
            'role'            => $role,
            'user'            => $user
        ];

        return view('dashboard/index', $data);
    }

    public function mahasiswa()
    {
        $user = session()->get('user');
        $role = session()->get('role');

        if ($role !== 'mahasiswa') {
            return redirect()->to('/dashboard')->with('error', 'Akses hanya untuk mahasiswa.');
        }

        $skripsiModel = new SkripsiModel();
        $mahasiswa_id = session()->get('mahasiswa_id');

        $skripsi = $skripsiModel->where('mahasiswa_id', $mahasiswa_id)->first();
        $bimbingan_count = $skripsi
            ? (new BimbinganModel())->where('skripsi_id', $skripsi['id'])->countAllResults()
            : 0;

        return view('dashboard/mahasiswa', [
            'user' => $user,
            'skripsi' => $skripsi,
            'bimbingan_count' => $bimbingan_count
        ]);
    }

    public function dosen()
    {
        $dosen_id = session()->get('dosen_id');

        $skripsiModel = new SkripsiModel();
        $bimbinganModel = new BimbinganModel();

        $skripsiList = $skripsiModel->where('dosen_id', $dosen_id)->findAll();

        $skripsiIds = array_column($skripsiList, 'id');
        $totalBimbingan = 0;
        if (!empty($skripsiIds)) {
            $bimbinganModel->whereIn('skripsi_id', $skripsiIds);
            $totalBimbingan = $bimbinganModel->countAllResults();
        }

        return view('dashboard/dosen', [
            'skripsi' => $skripsiList,
            'bimbingan_count' => $totalBimbingan
        ]);
    }

    public function uploadSkripsi()
    {
        $skripsiModel = new SkripsiModel();
        $mahasiswa_id = session()->get('mahasiswa_id');

        $file = $this->request->getFile('file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/skripsi/', $newName);

            $skripsiModel->save([
                'mahasiswa_id' => $mahasiswa_id,
                'judul'        => $this->request->getPost('judul'),
                'file'         => $newName,
                'status'       => 'Draft'
            ]);

            return redirect()->to('/dashboard/mahasiswa')->with('success', 'Berkas skripsi berhasil diupload.');
        }

        return redirect()->back()->with('error', 'Gagal upload file.');
    }
}
