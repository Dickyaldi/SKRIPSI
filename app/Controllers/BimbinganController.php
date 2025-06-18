<?php namespace App\Controllers;

use App\Models\BimbinganModel;

class BimbinganController extends BaseController
{
    public function index()
    {
        $model = new BimbinganModel();
        $data['bimbingan'] = $model->findAll();
        return view('bimbingan/index', $data);
    }

public function create()
{
    $skripsiModel = new \App\Models\SkripsiModel();
    $data['skripsi'] = $skripsiModel->findAll(); // Ambil semua skripsi
    return view('bimbingan/create', $data); // Kirim ke view
}
public function store()
{
    $file = $this->request->getFile('file');
    $fileName = null;

    if ($file && $file->isValid() && !$file->hasMoved()) {
        $fileName = $file->getRandomName();
        $file->move(FCPATH . 'uploads/bimbingan', $fileName);

    }

    $data = [
        'skripsi_id' => $this->request->getPost('skripsi_id'),
        'tanggal'    => $this->request->getPost('tanggal'),
        'catatan'    => $this->request->getPost('catatan'),
        'status'     => $this->request->getPost('status'),
        'file'       => $fileName
    ];

    $bimbinganModel = new \App\Models\BimbinganModel();
    $bimbinganModel->insert($data);

    return redirect()->to('/bimbingan')->with('success', 'Bimbingan berhasil ditambahkan.');
}



    public function edit($id)
    {
        $model = new BimbinganModel();
        $data['bimbingan'] = $model->find($id);
        return view('bimbingan/edit', $data);
    }

    public function update($id)
    {
        $model = new BimbinganModel();
        $model->update($id, [
            'skripsi_id' => $this->request->getPost('skripsi_id'),
            'tanggal'    => $this->request->getPost('tanggal'),
            'catatan'    => $this->request->getPost('catatan'),
            'status'     => $this->request->getPost('status'),
        ]);
        return redirect()->to('/bimbingan');
    }

    public function delete($id)
    {
        $model = new BimbinganModel();
        $model->delete($id);
        return redirect()->to('/bimbingan');
    }
}

