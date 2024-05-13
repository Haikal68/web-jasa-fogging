<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdersModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    protected $useTimeStamps = true;

    public function getOrders()
    {
        return $this->db->table('orders')
            ->join('services', 'services.service_id = orders.service_id')->get()->getResultArray();
    }

    public function getkonfirOrder()
    {
        return $this->db->table('orders')
            ->join('services', 'services.service_id = orders.service_id')->where('status_order', 'dikonfirmasi')->get()->getResultArray();
    }

    public function getDetailOrders($order_id)
    {
        return $this->db->table('orders')->where('order_id', $order_id)->get()->getRowArray();
    }

    public function addPesan($data)
    {
        return $this->db->table('orders')->insert($data);
    }

    public function konfirmasiOrder($data)
    {
        return $this->db->table('orders')->update($data);
    }

    public function prosesOrder($data)
    {
        return $this->db->table('orders')->update($data);
    }
}
