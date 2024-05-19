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

    public function getTotalPendapatan()
    {
        $query = $this->db->table('orders')->selectSum('total_harga')->get();
        $result = $query->getRow();
        return $result->total_harga;
    }

    public function getTotalPemesanan()
    {
        return $this->db->table('orders')->countAllResults();
    }

    public function getkonfirOrder()
    {
        return $this->db->table('orders')
            ->join('services', 'services.service_id = orders.service_id')
            ->where('status_order', 'paid')
            ->orWhere('status_order', 'diproses')->orWhere('status_order', 'selesai')
            ->get()->getResultArray();
    }

    public function getOrderDiambil()
    {
        return $this->db->table('orders')->where('teknisi_id', user()->id)->countAllResults();
    }

    public function getOrderPaid()
    {
        return $this->db->table('orders')->where('status_order', 'paid')->countAllResults();
    }

    public function getDetailOrders($order_id)
    {
        return $this->db->table('orders')->where('order_id', $order_id)
            ->join('services', 'services.service_id = orders.service_id')
            ->join('users', 'users.id = orders.teknisi_id')->get()->getRowArray();
    }

    public function prosesOrder($data, $order_id)
    {
        return $this->db->table('orders')->update($data, array('order_id' => $order_id));
    }

    public function selesaiOrder($data)
    {
        return $this->db->table('orders')->update($data);
    }

    public function addPesan($data)
    {
        return $this->db->table('orders')->insert($data);
    }

    public function updateOrderStatus($order_id, $status_order)
    {
        return $this->db->table('orders')
            ->where('order_id', $order_id)
            ->update(['status_order' => $status_order]);
    }

    public function getOrderByToken($order_id)
    {
        return $this->db->table('orders')->where('order_id', $order_id)->get()->getRowArray();
    }
}
