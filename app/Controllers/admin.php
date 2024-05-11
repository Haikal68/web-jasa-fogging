<?php

namespace App\Controllers;

use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;
use App\Models\UsersModel;
use PhpParser\Node\Stmt\Echo_;

class admin extends BaseController
{
    protected $UsersModel;

    public function __construct()
    {
        $this->UsersModel = new UsersModel();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Dashboard Admin'
        ];
        return view('admin/dashboard', $data);
    }

    public function users(): string
    {
        // $Mahasiswa = $this->UsersModel->findAll();

        $data = [
            'title' => 'Data Users',
            'user' => $this->UsersModel->getUsers()
        ];
        return view('admin/user', $data);
    }

    public function tambah_user()
    {
        $data = [
            'tittle' => 'Tambah User',
            'validation' => \Config\Services::validation(),
            'user' => $this->UsersModel->getUsers(),
            'group' => $this->UsersModel->getGroup(),

        ];
        return view('admin/users/tambah_user', $data);
    }

    public function save()
    {
        //validasi 
        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi.'
                ]
            ]

        ])) {
            return redirect()->to('/admin/tambah_user')->withInput();
        }

        $user_myth = new UserModel();
        $user_myth->withGroup($this->request->getVar('role'))->save([
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'fullname' => $this->request->getVar('fullname'),
            'password_hash' => Password::hash("123456"),
            'active' => 1
        ]);
        session()->setFlashdata('pesan', 'User berhasil ditambahkan.');
        return redirect()->to('/admin/users');
    }

    public function resetpass($id)
    {

        $user_myth = new UserModel();
        $this->UsersModel->save([
            'id' => $id,
            'password_hash' => Password::hash("123456"),
        ]);
        session()->setFlashdata('pesan', 'Password berhasil direset.');
        return redirect()->to('/admin/users');
    }

    public function editmahasiswa($nim)
    {
        $data = [
            'tittle' => 'Edit Data mahasiswa',
            'validation' => \Config\Services::validation(),
            'mahasiswa' => $this->UsersModel->editmahasiswa($nim),
            'jurusan' => $this->UsersModel->getJurusan(),
            'prodi' => $this->UsersModel->getProdi(),
        ];
        return view('admin/mahasiswa/edit_mahasiswa', $data);
    }

    public function updatemahasiswa($nim)
    {
        $data = [
            'nim' => $this->request->getVar('nim'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'jenkel' => $this->request->getVar('jenkel'),
            'id_jurusan' => $this->request->getVar('id'),
            'kode_prodi' => $this->request->getVar('kode_prodi'),
        ];
        $this->UsersModel->updatemahasiswa($data, $nim);
        session()->setFlashdata('pesan', 'Data Mahasiswa berhasil diupdate.');
        return redirect()->to('/admin/mahasiswa');
    }

    public function deleteuser($user_id)
    {

        $this->UsersModel->deleteuser($user_id);
        session()->setFlashdata('pesan', 'data berhasil dihapus.');
        return redirect()->to('/admin/users');
    }
}
