<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
<<<<<<< HEAD
    protected $table = 'tbl_mahasiswa';
    protected $useTimeStamps = true;
=======
    protected $table = 'users';
    protected $useTimeStamps = true;
    protected $allowedFields = ['fullname', 'username', 'email', 'password_hash', 'active'];
>>>>>>> 720ab1eed87664b1bb1ac49786d4921c4f7b813c

    public function getUsers()
    {
        return $this->db->table('users')
            ->join('auth_groups_users gs', 'users.id = gs.user_id')
            ->join('auth_groups g', 'g.id = gs.group_id')
            ->get()->getResultArray();
    }

    public function getGroup()
    {
        return $this->db->table('auth_groups')->get()->getResultArray();
    }

    public function deleteuser($user_id)
    {
        return $this->db->table('users')->delete(array('id' => $user_id));
    }
<<<<<<< HEAD
=======

    public function addUser($data)
    {
        return $this->db->table('users')->insert($data);
    }
>>>>>>> 720ab1eed87664b1bb1ac49786d4921c4f7b813c
}
