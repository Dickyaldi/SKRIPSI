<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\MahasiswaModel;
use CodeIgniter\Controller;
use App\Models\DosenModel;

class Auth extends Controller
{
    public function index()
    {
        return view('auth/login');
    }
    public function register()
    {
        return view('auth/register');
    }

    public function login()
{
    $session = session();
    $userModel = new UserModel();
    $dosenModel = new \App\Models\DosenModel();

    $username = $this->request->getPost('username');
    $password = md5($this->request->getPost('password'));

    $user = $userModel->where('username', $username)->first();

    if ($user && $user['password'] === $password) {
        $sessionData = [
            'user_id'   => $user['id'],
            'role'      => $user['role'],
            'logged_in' => true
        ];
            // Dosen
        if ($user['role'] === 'dosen') {
            $dosenModel = new DosenModel();
            $dosen = $dosenModel->where('user_id', $user['id'])->first();
            if ($dosen) {
                $sessionData['dosen_id'] = $dosen['id'];
            } else {
                return redirect()->back()->with('error', 'Dosen tidak ditemukan.');
            }
            $session->set($sessionData);
            $session->set([
    'user_id'   => $user['id'],
    'role'      => $user['role'],
    'dosen_id'  => $dosen['id'], // ← ini wajib
    'logged_in' => true
]);

            return redirect()->to('/dashboard/dosen');
        }

        // mahasiswa
        if ($user['role'] === 'mahasiswa') {
            $mahasiswaModel = new MahasiswaModel();
            $mahasiswa = $mahasiswaModel->where('user_id', $user['id'])->first();
            if ($mahasiswa) {
                $sessionData['mahasiswa_id'] = $mahasiswa['id'];
            }
            $session->set($sessionData);
            return redirect()->to('/bimbingan/index');
        }

        // admin
        if ($user['role'] === 'admin') {
            $session->set($sessionData);
            return redirect()->to('/seminar');
        }

        return redirect()->to('/login')->with('error', 'Role tidak dikenali.');
    }

    return redirect()->back()->with('error', 'Username atau password salah.');
}
public function storeRegister()
{
    $userModel = new \App\Models\UserModel();
    $mahasiswaModel = new \App\Models\MahasiswaModel();
    $dosenModel = new \App\Models\DosenModel();

    $role     = $this->request->getPost('role');
    $username = $this->request->getPost('username');
    $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
    $nim      = $this->request->getPost('nim');   // untuk mahasiswa
    $nidn     = $this->request->getPost('nidn');  // untuk dosen

    // ✅ Cek apakah username sudah digunakan
    if ($userModel->where('username', $username)->first()) {
        return redirect()->back()->with('error', 'Username sudah terdaftar.');
    }

    // ✅ Cek NIM unik untuk mahasiswa
if ($role === 'mahasiswa') {
    $nim = $this->request->getPost('nim');
    if (!$nim) {
        return redirect()->back()->with('error', 'NIM wajib diisi untuk mahasiswa.');
    }
}

    // ✅ Cek NIDN unik untuk dosen
    if ($role === 'dosen' && $nidn) {
        if ($dosenModel->where('nidn', $nidn)->first()) {
            return redirect()->back()->with('error', 'NIDN sudah terdaftar.');
        }
}
if ($userModel->where('username', $username)->first()) {
    return redirect()->back()->with('error', 'Username sudah digunakan.');
}

$email = $this->request->getPost('email');

if ($userModel->where('email', $email)->first()) {
    return redirect()->back()->with('error', 'Email sudah terdaftar.');
}

$userId = $userModel->insert([
    'username' => $username,
    'password' => $password,
    'role'     => $role,
    'email'    => $email
]);
    
    // ✅ Simpan ke tabel users
    $userId = $userModel->insert([
        'username' => $username,
        'password' => $password,
        'role'     => $role
    ]);

    // ✅ Simpan ke tabel role masing-masing
    if ($role === 'mahasiswa') {
        $mahasiswaModel->insert([
            'user_id' => $userId,
            'nama'    => $username,
            'nim'     => $nim
        ]);
    } elseif ($role === 'dosen') {
        $dosenModel->insert([
            'user_id' => $userId,
            'nama'    => $username,
            'nidn'    => $nidn
        ]);
    }

    // ✅ Set session & redirect
    session()->set([
        'user_id'   => $userId,
        'role'      => $role,
        'logged_in' => true
    ]);

    return redirect()->to('/dashboard/' . $role);
}

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}

