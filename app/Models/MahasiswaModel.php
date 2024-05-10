<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'tbl_mahasiswa';
    protected $useTimeStamps = true;

    public function getMahasiswa()
    {
        return $this->db->table('tbl_mahasiswa')
            ->join('tbl_jurusan', 'tbl_jurusan.id = tbl_mahasiswa.id_jurusan')
            ->join('tbl_prodi', 'tbl_prodi.kode_prodi = tbl_mahasiswa.kode_prodi')
            ->get()->getResultArray();
    }

    public function getJurusan()
    {
        return $this->db->table('tbl_jurusan')->get()->getResultArray();
    }


    public function getProdi()
    {
        return $this->db->table('tbl_prodi')
            ->join('tbl_jurusan', 'tbl_jurusan.id = tbl_prodi.id_jurusan')
            ->orderBy('id_jurusan', 'ASC')
            ->get()->getResultArray();
    }

    public function getMatkul()
    {
        return $this->db->table('tbl_matakuliah')
            ->join('tbl_jurusan', 'tbl_jurusan.id = tbl_matakuliah.id_jurusan')
            ->join('tbl_prodi', 'tbl_prodi.kode_prodi = tbl_matakuliah.kode_prodi')
            ->orderBy('tbl_matakuliah.id_jurusan', 'ASC')
            ->get()->getResultArray();
    }

    public function detail_mahasiswa($nim)
    {
        return $this->db->table('tbl_mahasiswa')->where('nim', $nim)
            ->join('tbl_jurusan', 'tbl_jurusan.id = tbl_mahasiswa.id_jurusan')
            ->join('tbl_prodi', 'tbl_prodi.id_jurusan = tbl_jurusan.id')
            ->get()->getRowArray();
    }

    public function addmahasiswa($data)
    {
        return $this->db->table('tbl_mahasiswa')->insert($data);
    }

    public function editmahasiswa($nim)
    {
        return $this->db->table('tbl_mahasiswa')->where('nim', $nim)->get()->getRowArray();
    }
    public function updatemahasiswa($data, $nim)
    {
        return $this->db->table('tbl_mahasiswa')->update($data, array('nim' => $nim));
    }
    public function deletemahasiswa($nim)
    {
        return $this->db->table('tbl_mahasiswa')->delete(array('nim' => $nim));
    }

    public function addjurusan($data)
    {
        return $this->db->table('tbl_jurusan')->insert($data);
    }

    public function editjurusan($id)
    {
        return $this->db->table('tbl_jurusan')->where('id', $id)->get()->getRowArray();
    }

    public function udpatejurusan($data, $id)
    {
        return $this->db->table('tbl_jurusan')->update($data, array('id' => $id));
    }

    public function deletejurusan($id)
    {
        return $this->db->table('tbl_jurusan')->delete(array('id' => $id));
    }

    public function addprodi($data)
    {
        return $this->db->table('tbl_prodi')->insert($data);
    }

    public function editprodi($kode_prodi)
    {
        return $this->db->table('tbl_prodi')->where('kode_prodi', $kode_prodi)->get()->getRowArray();
    }

    public function updateprodi($data, $kode_prodi)
    {
        return $this->db->table('tbl_prodi')->update($data, array('kode_prodi' => $kode_prodi));
    }
    public function deleteprodi($kode_prodi)
    {
        return $this->db->table('tbl_prodi')->delete(array('kode_prodi' => $kode_prodi));
    }

    public function addmatkul($data)
    {
        return $this->db->table('tbl_matakuliah')->insert($data);
    }

    public function editmatkul($kode_matakuliah)
    {
        return $this->db->table('tbl_matakuliah')->where('kode_matakuliah', $kode_matakuliah)->get()->getRowArray();
    }

    public function updatematkul($data, $kode_matakuliah)
    {
        return $this->db->table('tbl_matakuliah')->update($data, array('kode_matakuliah' => $kode_matakuliah));
    }

    public function deletematkul($kode_matakuliah)
    {
        return $this->db->table('tbl_matakuliah')->delete(array('kode_matakuliah' => $kode_matakuliah));
    }
}
