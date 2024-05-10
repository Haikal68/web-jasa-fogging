<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use PhpParser\Node\Stmt\Echo_;

class admin extends BaseController
{
    protected $MahasiswaModel;

    public function __construct()
    {
        $this->MahasiswaModel = new MahasiswaModel();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Dashboard Admin'
        ];
        return view('admin/dashboard', $data);
    }

    public function mahasiswa(): string
    {


        // $Mahasiswa = $this->MahasiswaModel->findAll();

        $data = [
            'title' => 'Data Mahasiswa',
            'mahasiswa' => $this->MahasiswaModel->getMahasiswa()
        ];
        return view('admin/mahasiswa', $data);
    }

    public function tambah_mahasiswa()
    {
        $data = [
            'tittle' => 'Tambah mahasiswa',
            'validation' => \Config\Services::validation(),
            'jurusan' => $this->MahasiswaModel->getJurusan(),
            'prodi' => $this->MahasiswaModel->getProdi(),

        ];
        return view('admin/mahasiswa/tambah_mahasiswa', $data);
    }

    public function savemahasiswa()
    {
        //validasi 
        if (!$this->validate([
            'nim' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi.'
                ]
            ]

        ])) {
            return redirect()->to('/admin/tambah_mahasiswa')->withInput();
        }
        $data = [
            'nim' => $this->request->getVar('nim'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'jenkel' => $this->request->getVar('jenkel'),
            'id_jurusan' => $this->request->getVar('id'),
            'kode_prodi' => $this->request->getVar('kode_prodi'),
        ];
        $this->MahasiswaModel->addmahasiswa($data);
        session()->setFlashdata('pesan', 'Mahasiswa berhasil ditambahkan.');
        return redirect()->to('/admin/mahasiswa');
    }

    public function editmahasiswa($nim)
    {
        $data = [
            'tittle' => 'Edit Data mahasiswa',
            'validation' => \Config\Services::validation(),
            'mahasiswa' => $this->MahasiswaModel->editmahasiswa($nim),
            'jurusan' => $this->MahasiswaModel->getJurusan(),
            'prodi' => $this->MahasiswaModel->getProdi(),
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
        $this->MahasiswaModel->updatemahasiswa($data, $nim);
        session()->setFlashdata('pesan', 'Data Mahasiswa berhasil diupdate.');
        return redirect()->to('/admin/mahasiswa');
    }

    public function deletemahasiswa($nim)
    {

        $this->MahasiswaModel->deletemahasiswa($nim);
        session()->setFlashdata('pesan', 'data berhasil dihapus.');
        return redirect()->to('/admin/mahasiswa');
    }

    public function jurusan(): string
    {

        $data = [
            'title' => 'Data Mahasiswa',
            'jurusan' => $this->MahasiswaModel->getJurusan(),
        ];
        return view('admin/jurusan', $data);
    }

    public function tambah_jurusan()
    {
        $data = [
            'tittle' => 'Tambah jurusan',
            'validation' => \Config\Services::validation(),
            'jurusan' => $this->MahasiswaModel->getJurusan(),


        ];
        return view('admin/jurusan/tambah_jurusan', $data);
    }

    public function savejurusan()
    {
        //validasi 
        if (!$this->validate([
            'nama_jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi.'
                ]
            ]

        ])) {
            return redirect()->to('/admin/tambah_jurusan')->withInput();
        }
        $data = [
            'nama_jurusan' => $this->request->getVar('nama_jurusan'),

        ];
        $this->MahasiswaModel->addjurusan($data);
        session()->setFlashdata('pesan', 'Jurusan berhasil ditambahkan.');
        return redirect()->to('/admin/jurusan');
    }

    public function editjurusan($id)
    {
        $data = [
            'tittle' => 'Edit Data jurusan',
            'validation' => \Config\Services::validation(),
            'jurusan' => $this->MahasiswaModel->editjurusan($id),
        ];
        return view('admin/jurusan/edit_jurusan', $data);
    }

    public function udpatejurusan($id)
    {
        $data = [
            'id' => $this->request->getVar('id'),
            'nama_jurusan' => $this->request->getVar('nama_jurusan'),
        ];
        $this->MahasiswaModel->udpatejurusan($data, $id);
        session()->setFlashdata('pesan', 'Data Jurusan berhasil diupdate.');
        return redirect()->to('/admin/jurusan');
    }

    public function deletejurusan($id)
    {
        $this->MahasiswaModel->deletejurusan($id);
        session()->setFlashdata('pesan', 'data berhasil dihapus.');
        return redirect()->to('/admin/jurusan');
    }

    public function prodi(): string
    {

        $data = [
            'title' => 'Data Prodi',
            'jurusan' => $this->MahasiswaModel->getJurusan(),
            'prodi' => $this->MahasiswaModel->getProdi(),
        ];
        return view('admin/prodi', $data);
    }

    public function tambah_prodi()
    {
        $data = [
            'title' => 'Tambah prodi',
            'validation' => \Config\Services::validation(),
            'jurusan' => $this->MahasiswaModel->getJurusan(),
            'prodi' => $this->MahasiswaModel->getProdi(),


        ];
        return view('admin/prodi/tambah_prodi', $data);
    }

    public function saveprodi()
    {
        //validasi 
        if (!$this->validate([
            'kode_prodi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi.'
                ]
            ]

        ])) {
            return redirect()->to('/admin/tambah_prodi')->withInput();
        }
        $data = [
            'kode_prodi' => $this->request->getVar('kode_prodi'),
            'id_jurusan' => $this->request->getVar('id_jurusan'),
            'nama_program_studi' => $this->request->getVar('nama_program_studi'),

        ];
        $this->MahasiswaModel->addprodi($data);
        session()->setFlashdata('pesan', 'Program Studi berhasil ditambahkan.');
        return redirect()->to('/admin/prodi');
    }

    public function editprodi($kode_prodi)
    {
        $data = [
            'title' => 'Edit Data Prodi',
            'validation' => \Config\Services::validation(),
            'jurusan' => $this->MahasiswaModel->getJurusan(),
            'prodi' => $this->MahasiswaModel->editprodi($kode_prodi),
        ];
        return view('admin/prodi/edit_prodi', $data);
    }

    public function updateprodi($kode_prodi)
    {
        $data = [
            'kode_prodi' => $this->request->getVar('kode_prodi'),
            'id_jurusan' => $this->request->getVar('id_jurusan'),
            'nama_program_studi' => $this->request->getVar('nama_program_studi'),
        ];
        $this->MahasiswaModel->updateprodi($data, $kode_prodi);
        session()->setFlashdata('pesan', 'Data Prodi berhasil diupdate.');
        return redirect()->to('/admin/prodi');
    }

    public function deleteprodi($kode_prodi)
    {
        $this->MahasiswaModel->deleteprodi($kode_prodi);
        session()->setFlashdata('pesan', 'data berhasil dihapus.');
        return redirect()->to('/admin/prodi');
    }

    public function matkul(): string
    {
        $data = [
            'title' => 'Data Matkul',
            'jurusan' => $this->MahasiswaModel->getJurusan(),
            'prodi' => $this->MahasiswaModel->getProdi(),
            'matkul' => $this->MahasiswaModel->getMatkul(),
        ];
        return view('admin/matkul', $data);
    }

    public function tambah_matkul()
    {
        $data = [
            'title' => 'Tambah Matkul',
            'validation' => \Config\Services::validation(),
            'jurusan' => $this->MahasiswaModel->getJurusan(),
            'prodi' => $this->MahasiswaModel->getProdi(),
            'matkul' => $this->MahasiswaModel->getMatkul(),
        ];
        return view('admin/matkul/tambah_matkul', $data);
    }

    public function savematkul()
    {
        //validasi 
        if (!$this->validate([
            'kode_matakuliah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi.'
                ]
            ]

        ])) {
            return redirect()->to('/admin/tambah_matkul')->withInput();
        }
        $data = [
            'kode_matakuliah' => $this->request->getVar('kode_matakuliah'),
            'nama_matakuliah' => $this->request->getVar('nama_matakuliah'),
            'sks' => $this->request->getVar('sks'),
            'jam' => $this->request->getVar('jam'),
            'semester' => $this->request->getVar('semester'),
            'kode_prodi' => $this->request->getVar('kode_prodi'),
            'id_jurusan' => $this->request->getVar('id_jurusan'),

        ];
        $this->MahasiswaModel->addmatkul($data);
        session()->setFlashdata('pesan', 'Mata Kuliah berhasil ditambahkan.');
        return redirect()->to('/admin/matkul');
    }

    public function editmatkul($kode_matakuliah)
    {
        $data = [
            'title' => 'Edit Data Mata Kuliah',
            'validation' => \Config\Services::validation(),
            'jurusan' => $this->MahasiswaModel->getJurusan(),
            'prodi' => $this->MahasiswaModel->getProdi(),
            'matkul' => $this->MahasiswaModel->editmatkul($kode_matakuliah),
        ];
        return view('admin/matkul/edit_matkul', $data);
    }

    public function updatematkul($kode_matakuliah)
    {
        $data = [
            'kode_matakuliah' => $this->request->getVar('kode_matakuliah'),
            'nama_matakuliah' => $this->request->getVar('nama_matakuliah'),
            'sks' => $this->request->getVar('sks'),
            'jam' => $this->request->getVar('jam'),
            'semester' => $this->request->getVar('semester'),
            'kode_prodi' => $this->request->getVar('kode_prodi'),
            'id_jurusan' => $this->request->getVar('id_jurusan'),
        ];
        $this->MahasiswaModel->updatematkul($data, $kode_matakuliah);
        session()->setFlashdata('pesan', 'Data Mata Kuliah berhasil diupdate.');
        return redirect()->to('/admin/matkul');
    }

    public function deletematkul($kode_matakuliah)
    {
        $this->MahasiswaModel->deletematkul($kode_matakuliah);
        session()->setFlashdata('pesan', 'data berhasil dihapus.');
        return redirect()->to('/admin/matkul');
    }
}
