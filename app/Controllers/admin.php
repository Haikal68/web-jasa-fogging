<?php

namespace App\Controllers;

use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;
use App\Models\UsersModel;
use App\Models\OrdersModel;

use App\Models\ServicesModel;
use PhpParser\Node\Stmt\Echo_;

class admin extends BaseController
{
    protected $UsersModel;

    protected $ServicesModel;
    protected $OrdersModel;

    public function __construct()
    {
        $this->UsersModel = new UsersModel();

        $this->ServicesModel = new ServicesModel();

        $this->OrdersModel = new OrdersModel();
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

    public function deleteuser($user_id)
    {

        $this->UsersModel->deleteuser($user_id);
        session()->setFlashdata('pesan', 'data berhasil dihapus.');
        return redirect()->to('/admin/users');
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
        ];
        return view('admin/services/tambahServices', $data);
    }

    public function saveServices()
    {
        //validasi 
        if (!$this->validate([
            'nama_layanan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi.'
                ]
            ]

        ])) {
            return redirect()->to('/admin/tambahServices')->withInput();
        }
        $data = [
            'nama_layanan' => $this->request->getVar('nama_layanan'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'harga' => $this->request->getVar('harga'),
            'luas_area' => $this->request->getVar('luas'),
            'durasi' => $this->request->getVar('durasi'),
        ];
        $this->ServicesModel->addServices($data);
        session()->setFlashdata('pesan', 'Services berhasil ditambahkan.');
        return redirect()->to('/admin/Services');
    }

    public function editServices($service_id)
    {
        $data = [
            'tittle' => 'Edit Data Services',
            'validation' => \Config\Services::validation(),
            'services' => $this->ServicesModel->getServicesById($service_id),
        ];
        return view('admin/services/editServices', $data);
    }

    public function updateServices($service_id)
    {
        $data = [
            'nama_layanan' => $this->request->getVar('nama_layanan'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'harga' => $this->request->getVar('harga'),
            'luas_area' => $this->request->getVar('luas'),
            'durasi' => $this->request->getVar('durasi'),
        ];
        $this->ServicesModel->updateServices($data, $service_id);
        session()->setFlashdata('pesan', 'Data Services berhasil diupdate.');
        return redirect()->to('/admin/Services');
    }

    public function deleteServices($service_id)
    {
        $this->ServicesModel->deleteServices($service_id);
        session()->setFlashdata('pesan', 'data berhasil dihapus.');
        return redirect()->to('/admin/Services');
    }


    //Orders
    public function orders(): string
    {

        $data = [
            'title' => 'Data Orders',
            'orders' => $this->OrdersModel->getOrders()
        ];
        return view('admin/orders', $data);
    }
}
