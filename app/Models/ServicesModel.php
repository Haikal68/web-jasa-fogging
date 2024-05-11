<?php

namespace App\Models;

use CodeIgniter\Model;

class ServicesModel extends Model
{
    protected $table = 'services';
    protected $allowedFields = ['nama_layanan', 'deskripsi', 'harga', 'luas_area', 'durasi', 'kategori_id'];
    protected $primaryKey = 'services_id';
    protected $useTimeStamps = true;

    public function getservices()
    {
        return $this->db->table('services')->get()->getResultArray();
    }

    public function getservicesById($service_id)
    {
        return $this->db->table('services')->where('service_id', $service_id)->get()->getRowArray();
    }
    public function addServices($data)
    {
        return $this->db->table('services')->insert($data);
    }

    public function deleteservices($service_id)
    {
        return $this->db->table('services')->delete(array('service_id' => $service_id));
    }

    public function updateServices($data, $service_id)
    {
        return $this->db->table('services')->update($data, array('service_id' => $service_id));
    }
}
