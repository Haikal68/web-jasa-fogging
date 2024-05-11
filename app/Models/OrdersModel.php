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
        return $this->db->table('orders')->get()->getResultArray();
    }

    public function getDetailOrders($order_id)
    {
        return $this->db->table('orders')->where('order_id', $order_id)->get()->getRowArray();
    }

    public function addPesan($data)
    {
        return $this->db->table('orders')->insert($data);
    }
}
