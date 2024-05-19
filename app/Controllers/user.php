<?php

namespace App\Controllers;

use App\Models\ServicesModel;
use App\Models\OrdersModel;
use App\Models\UsersModel;
use CodeIgniter\I18n\Time;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;

class User extends BaseController
{
    protected $ServicesModel;
    protected $OrdersModel;
    protected $UsersModel;

    public function __construct()
    {
        $this->UsersModel = new UsersModel();
        $this->ServicesModel = new ServicesModel();
        $this->OrdersModel = new OrdersModel();
    }

    public function index(): string
    {
        $data = [
            'title' => 'FoggingKu',
            'servis' => $this->ServicesModel->getservices()
        ];
        return view('landingPage/index', $data);
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
        // Konfigurasi Midtrans
        Config::$serverKey = 'SB-Mid-server-c7_g2tKMOOlkKG-rm3C8FB7W';
        Config::$isProduction = false; // Ganti menjadi true untuk production

        // Buat transaksi Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => mt_rand(), // Generate order ID unik
                'gross_amount' => $this->request->getVar('total_harga'),
            ],
            'customer_details' => [
                'first_name' => $this->request->getVar('nama_customer'),
                'shipping_address' => $this->request->getVar('alamat_layanan'),
                'phone' => $this->request->getVar('no_telp'),
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        // Simpan data pemesanan sementara
        $data = [
            'order_id' => $params['transaction_details']['order_id'], // Save the order_id generated
            'users_id' => $this->request->getVar('users_id'),
            'nama_customer' => $this->request->getVar('nama_customer'),
            'no_telp' => $this->request->getVar('no_telp'),
            'tanggal_layanan' => $this->request->getVar('tanggal_layanan'),
            'alamat_layanan' => $this->request->getVar('alamat_layanan'),
            'service_id' => $this->request->getVar('service_id'),
            'tanggal_pemesanan' => Time::now(),
            'total_harga' => $this->request->getVar('total_harga'),
            'token' => $snapToken, // Simpan token Midtrans
        ];

        $this->OrdersModel->addPesan($data);
        echo json_encode($snapToken);
        exit;
    }

    public function updateOrder()
    {
        $order_id = $this->request->getVar('order_id');
        $status_order = $this->request->getVar('status_order');

        $this->OrdersModel->updateOrderStatus($order_id, $status_order);
        session()->setFlashdata('pesan', 'data berhasil diupdate.');
    }

    public function notifikasi()
    {
        // Konfigurasi Midtrans
        Config::$serverKey = 'SB-Mid-server-c7_g2tKMOOlkKG-rm3C8FB7W';
        Config::$isProduction = false; // Ganti menjadi true untuk production

        // Notifikasi dari Midtrans
        $notif = new Notification();

        $status = $notif->transaction_status;
        $order_id = $notif->order_id;
        if ($status == 'capture' || $status == 'settlement') {
            // Pembayaran berhasil
            $this->OrdersModel->updateOrderStatus($order_id, 'paid');
        } else if ($status == 'pending') {
            // Pembayaran sedang diproses
        } else if ($status == 'deny') {
            // Pembayaran ditolak
        } else if ($status == 'expire') {
            // Pembayaran kadaluarsa
        } else if ($status == 'cancel') {
            // Pembayaran dibatalkan
        }
    }
}
