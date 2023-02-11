<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{

    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['email','username','fullname','no_telepon','alamat','deskripsi','user_image','password_hash','active'];


    public function getUsers()
    {
        return $this->select('email','username','fullname','no_telepon','alamat','user_image','deskripsi')
        ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
        ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
        ->findAll();
    }

    public function getUsersById($id_user = false)
    {
        if ($id_user === false) {
            return $this->select('users.id','email','username','fullname','no_telepon','alamat','user_image')
        ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
        ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
        ->findAll();
        } else {
            return $this->where(['id'=>$id_user])->first();
        }
        
    }
    public function countAllUsers()
    {
        // return $this->select('*, COUNT(id) as total');
        // ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
        // ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
        $hasil = $this->db->table('users')->countAll();
        return $hasil;
    }
}