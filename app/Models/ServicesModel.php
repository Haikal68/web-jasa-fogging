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
        return $this->db->table('services')
            ->join('categories', 'services.kategori_id = categories.kategori_id')
            ->get()->getResultArray();
    }

    public function getservicesById($id)
    {
        return $this->db->table('services')->where('services_id', $id)->get()->getRowArray();
    }

    public function deleteservices($services_id)
    {
        return $this->db->table('services')->delete(array('services_id' => $services_id));
    }
}
