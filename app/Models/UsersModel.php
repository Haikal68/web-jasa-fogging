<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $useTimeStamps = true;
    protected $allowedFields = ['fullname', 'username', 'email', 'password_hash', 'active'];

    public function getUsers()
    {
        return $this->db->table('users')
            ->join('auth_groups_users gs', 'users.id = gs.user_id')
            ->join('auth_groups g', 'g.id = gs.group_id')
            ->get()->getResultArray();
    }
    public function getAdmin()
    {
        return $this->db->table('users')
            ->join('auth_groups_users gs', 'users.id = gs.user_id')
            ->join('auth_groups g', 'g.id = gs.group_id')
            ->where('g.id', 4)->orWhere('g.id', 1)
            ->get()->getResultArray();
    }
    public function getWorker()
    {
        return $this->db->table('users')
            ->join('auth_groups_users gs', 'users.id = gs.user_id')
            ->join('auth_groups g', 'g.id = gs.group_id')->where('g.id', 4)->get()->getResultArray();
    }
    public function getTotalCustomer()
    {
        return $this->db->table('users')
            ->join('auth_groups_users gs', 'users.id = gs.user_id')
            ->join('auth_groups g', 'g.id = gs.group_id')->where('g.id', 2)->countAllResults();
    }

    public function getDetailUser($user_id)
    {
        return $this->db->table('users')
            ->join('auth_groups_users gs', 'users.id = gs.user_id')
            ->join('auth_groups g', 'g.id = gs.group_id')->where('users.id', $user_id)->get()->getRowArray();
    }

    public function getGroup()
    {
        return $this->db->table('auth_groups')->get()->getResultArray();
    }

    public function deleteuser($user_id)
    {
        return $this->db->table('users')->delete(array('id' => $user_id));
    }

    public function addUser($data)
    {
        return $this->db->table('users')->insert($data);
    }
}
