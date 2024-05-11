<?php

namespace App\Controllers;

use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;
use App\Models\UsersModel;
use App\Models\CategoriesModel;
use App\Models\ServicesModel;
use PhpParser\Node\Stmt\Echo_;

class admin extends BaseController
{
    protected $UsersModel;
    protected $CategoriesModel;
    protected $ServicesModel;

    public function __construct()
    {
        $this->UsersModel = new UsersModel();
        $this->CategoriesModel = new CategoriesModel();
        $this->ServicesModel = new ServicesModel();
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



    // kategori
    public function categories(): string
    {
        // $Mahasiswa = $this->UsersModel->findAll();

        $data = [
            'title' => 'Data Categories',
            'kategori' => $this->CategoriesModel->findAll()
        ];
        return view('admin/categories', $data);
    }

    public function tambahCategories()
    {
        $data = [
            'tittle' => 'Tambah Categories',
            'validation' => \Config\Services::validation(),
            'kategori' => $this->CategoriesModel->getCategories(),
        ];
        return view('admin/kategori/tambahKategori', $data);
    }

    public function saveCategories()
    {
        //validasi 
        if (!$this->validate([
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi.'
                ]
            ]
        ])) {
            return redirect()->to('/admin/tambahCategories')->withInput();
        }


        $this->CategoriesModel->save([
            'nama_kategori' => $this->request->getVar('kategori'),
            'deskripsi' => $this->request->getVar('deskripsi'),
        ]);

        session()->setFlashdata('pesan', 'Kategori berhasil ditambahkan.');
        return redirect()->to('/admin/categories');
    }

    public function editcategories($kategori_id)
    {
        $data = [
            'tittle' => 'Edit Data mahasiswa',
            'validation' => \Config\Services::validation(),
            'kategori' => $this->CategoriesModel->getCategoriesById($kategori_id),
        ];
        return view('admin/kategori/editKategori', $data);
    }

    public function updateCategories($kategori_id)
    {
        $data = [
            'kategori_id' => $kategori_id,
            'nama_kategori' => $this->request->getVar('kategori'),
            'deskripsi' => $this->request->getVar('deskripsi'),
        ];

        $this->CategoriesModel->save($data);
        session()->setFlashdata('pesan', 'Data Kategori berhasil diupdate.');
        return redirect()->to('/admin/categories');
    }

    public function deleteCategories($kategori_id)
    {

        $this->CategoriesModel->deleteCategories($kategori_id);
        session()->setFlashdata('pesan', 'data berhasil dihapus.');
        return redirect()->to('/admin/categories');
    }



    // service
    public function Services(): string
    {
        // $Mahasiswa = $this->UsersModel->findAll();

        $data = [
            'title' => 'Data Services',
            'service' => $this->ServicesModel->getservices()
        ];
        return view('admin/services', $data);
    }

    public function tambahServices()
    {
        $data = [
            'tittle' => 'Tambah Services',
            'validation' => \Config\Services::validation(),
            'kategori' => $this->CategoriesModel->findAll(),
        ];
        return view('admin/services/tambahServices', $data);
    }

    public function saveServices()
    {
        //validasi 
        if (!$this->validate([
            'layanan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi.'
                ]
            ]
        ])) {
            return redirect()->to('/admin/tambahServices')->withInput();
        }


        $this->ServicesModel->save([
            'nama_layanan' => $this->request->getVar('layanan'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'harga' => $this->request->getVar('harga'),
            'luas_area' => $this->request->getVar('luas'),
            'durasi' => $this->request->getVar('durasi'),
            'kategori_id' => $this->request->getVar('id_kategori'),
        ]);

        session()->setFlashdata('pesan', 'Layanan berhasil ditambahkan.');
        return redirect()->to('/admin/services');
    }

    public function editServices($kategori_id)
    {
        $data = [
            'tittle' => 'Edit Data mahasiswa',
            'validation' => \Config\Services::validation(),
            'kategori' => $this->ServicesModel->getServicesById($kategori_id),
        ];
        return view('admin/kategori/editKategori', $data);
    }

    public function updateServices($kategori_id)
    {
        $data = [
            'kategori_id' => $kategori_id,
            'nama_kategori' => $this->request->getVar('kategori'),
            'deskripsi' => $this->request->getVar('deskripsi'),
        ];

        $this->ServicesModel->save($data);
        session()->setFlashdata('pesan', 'Data Kategori berhasil diupdate.');
        return redirect()->to('/admin/Services');
    }

    public function deleteServices($kategori_id)
    {

        $this->ServicesModel->deleteServices($kategori_id);
        session()->setFlashdata('pesan', 'data berhasil dihapus.');
        return redirect()->to('/admin/Services');
    }
}
