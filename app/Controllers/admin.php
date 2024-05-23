<?php

namespace App\Controllers;

use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;
use CodeIgniter\Controller;
use App\Models\UsersModel;
use App\Models\OrdersModel;
use TCPDF;
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
            'title' => 'Dashboard Admin',
            'pendapatan' => $this->OrdersModel->getTotalPendapatan(),
            'pemesanan' => $this->OrdersModel->getTotalPemesanan(),
            'akun' => $this->UsersModel->getTotalCustomer(),

        ];
        return view('admin/dashboard', $data);
    }

    public function users(): string
    {
        // $Mahasiswa = $this->UsersModel->findAll();

        $data = [
            'title' => 'Data Users',
            'user' => $this->UsersModel->getAdmin()
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
        $validation = \Config\Services::validation();

        //validasi 
        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} Harus Diisi.',
                    'valid_email' => 'Format {field} tidak valid.'
                ]
            ],
            'fullname' => [
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
        return redirect()->to('/admin/workers');
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

    public function workers(): string
    {
        // $Mahasiswa = $this->UsersModel->findAll();

        $data = [
            'title' => 'Data Workers    ',
            'worker' => $this->UsersModel->getWorker()
        ];
        return view('admin/workers', $data);
    }

    public function detailUser($user_id): string
    {
        $data = [
            'title' => 'Data Orders',
            'worker' => $this->UsersModel->getDetailUser($user_id),
        ];

        return view('admin/users/detail_user', $data);
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
            'orders' => $this->OrdersModel->getOrders(),
        ];
        return view('admin/orders', $data);
    }

    public function filterOrders()
    {
        $tglAwal = $this->request->getPost('tglAwal');
        $tglAkhir = $this->request->getPost('tglAkhir');

        $orderModel = new OrdersModel();
        $orders = $orderModel->where('tanggal_pemesanan >=', $tglAwal)
            ->join('services', 'services.service_id = orders.service_id')
            ->where('tanggal_pemesanan <=', $tglAkhir)->whereIn('status_order', ['paid', 'diproses', 'selesai'])
            ->findAll();

        $pendapatan = $orderModel->selectSum('total_harga')->where('tanggal_pemesanan >=', $tglAwal)
            ->where('tanggal_pemesanan <=', $tglAkhir)->whereIn('status_order', ['paid', 'diproses', 'selesai'])
            ->get()->getRow();


        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadhtml(view('admin/print/printOrder', [
            'orders' => $orders,
            'pendapatan' => $pendapatan,
            'tglAwal' => $tglAwal,
            'tglAkhir' => $tglAkhir
        ]));

        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('Laporan Pendapatan.pdf');
    }

    public function printUser()
    {

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadhtml(view('admin/print/printUser', [
            'users' => $this->UsersModel->getAdmin(),
        ]));

        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('Laporan Data Pegawai.pdf');
    }

    public function detailorder($order_id): string
    {
        $data = [
            'title' => 'Data Orders',
            'orders' => $this->OrdersModel->getDetailOrders($order_id),
        ];
        return view('admin/orderDetail', $data);
    }

    public function konfirmasiOrder()
    {
        $data = [
            'status_order' => "dikonfirmasi",
        ];
        $this->OrdersModel->konfirmasiOrder($data);
        session()->setFlashdata('pesan', 'data berhasil dikonfirmasi.');
        return redirect()->to('/admin/orders');
    }
}
