<?php

namespace App\Controllers;

use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;
use App\Models\UsersModel;
use App\Models\OrdersModel;

use App\Models\ServicesModel;
use PhpParser\Node\Stmt\Echo_;

class worker extends BaseController
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
            'title' => 'Dashboard Worker',
            'orders' => $this->OrdersModel->getkonfirOrder(),

        ];
        return view('admin/worker', $data);
    }

    public function prosesOrder()
    {
        $data = [
            'status_order' => "diproses",
            'teknisi_id' => user()->id,

        ];
        $this->OrdersModel->prosesOrder($data);
        session()->setFlashdata('pesan', 'data berhasil diambil.');
        return redirect()->to('/worker');
    }
}
