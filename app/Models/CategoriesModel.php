<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriesModel extends Model
{
    protected $table = 'categories';
    protected $allowedFields = ['nama_kategori', 'deskripsi'];
    protected $primaryKey = 'kategori_id';
    protected $useTimeStamps = true;

    public function getCategories()
    {
        return $this->db->table('categories');
    }

    public function getCategoriesById($id)
    {
        return $this->db->table('categories')->where('kategori_id', $id)->get()->getRowArray();
    }

    public function deleteCategories($kategori_id)
    {
        return $this->db->table('categories')->delete(array('kategori_id' => $kategori_id));
    }
}
