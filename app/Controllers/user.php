<?php

namespace App\Controllers;

use App\Models\ServicesModel;
use App\Models\OrdersModel;
use App\Models\UsersModel;
use CodeIgniter\I18n\Time;


class user extends BaseController
{


    protected $ServicesModel;
    protected $OrdersModel;
    protected $UsersModel;

    public function __construct()
    {
        $this->UsersModel = new UsersModel();

        $this->ServicesModel = new ServicesModel();

        $this->OrdersModel = new OrdersModel();

        // helper('date');
        // helper('time');
    }
    public function index(): string
    {
        $data = [
            'title' => 'FoggingKu',
            'servis' => $this->ServicesModel->getservices()
        ];
        return view('landingPage/index', $data);
    }

    public function pemesanan(): string
    {
        $data = [
            'title' => 'FoggingKu',
            'servis' => $this->ServicesModel->getservices()
        ];
        return view('landingPage/pemesanan.php', $data);
    }
    public function success(): string
    {
        $data = [
            'title' => 'FoggingKu',
        ];
        return view('landingPage/success.php', $data);
    }

    public function getForm($service_id): string
    {
        $data = [
            'title' => 'FoggingKu',
            'servis' => $this->ServicesModel->getservices(),
            'detail' => $this->ServicesModel->getservicesById($service_id)
        ];
        return view('landingPage/pemesanan.php', $data);
    }

    public function pesan()
    {

        $gambar = $this->request->getFile('bukti_pembayaran');

        $gambar->move('img');

        $namaGambar = $gambar->getName();
        $data = [
            'nama_customer' => $this->request->getVar('nama_customer'),
            'no_telp' => $this->request->getVar('no_telp'),
            'tanggal_layanan' => $this->request->getVar('tanggal_layanan'),
            'alamat_layanan' => $this->request->getVar('alamat_layanan'),
            'service_id' => $this->request->getVar('service_id'),
            'tanggal_pemesanan' => Time::now(),
            'bukti_pembayaran' => $namaGambar,
            'total_harga' => $this->request->getVar('total_harga'),
        ];
        $this->OrdersModel->addPesan($data);
        session()->setFlashdata('pesan', 'Order berhasil ditambahkan.');
        return redirect()->to('/user/success');
    }
}
