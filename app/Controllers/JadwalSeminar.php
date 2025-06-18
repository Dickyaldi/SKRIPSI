<?php namespace App\Controllers;

use App\Models\JadwalSeminarModel;
use App\Models\SkripsiModel;

class JadwalSeminar extends BaseController
{
    public function index()
    {
        $model = new JadwalSeminarModel();
        $data['jadwal'] = $model->findAll();
        return view('seminar/index', $data);
    }

    public function create()
    {
        $skripsi = new SkripsiModel();
        $data['skripsi'] = $skripsi->findAll();
        return view('seminar/create', $data);
    }

    public function store()
    {
        $model = new JadwalSeminarModel();
        $model->insert([
            'skripsi_id' => $this->request->getPost('skripsi_id'),
            'jenis'      => $this->request->getPost('jenis'),
            'tanggal'    => $this->request->getPost('tanggal'),
            'tempat'     => $this->request->getPost('tempat'),
        ]);
        return redirect()->to('/seminar');
    }

    public function delete($id)
    {
        (new JadwalSeminarModel())->delete($id);
        return redirect()->to('/seminar');
    }
}
