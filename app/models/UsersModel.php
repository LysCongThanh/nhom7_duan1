<?php

class UsersModel extends Model {

    
    private $_table = 'users';
    private $_field = '*';

    function tableFill()
    {
        return 'users';
    }
    function fieldFill()
    {
        return '*';
    }
    function primaryKey()
    {
        return 'id';
    }


    public function getList()
    {
        $data = $this->db->query("SELECT $this->_field FROM $this->_table")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getLatestId()
    {
        $data = $this->db->table('users')->orderBy('id', 'DESC')->first();
        return $data['id'] + 1;
    }
   

    public function getDetailUser($id)
    {
        $data = $this->db->select('u.*, c.tel, a.address')
                        ->table('users as u')
                        ->leftJoin('contacts as c', 'u.id = c.user_id')
                        ->leftJoin('addresses as a', 'a.user_id = u.id')
                        ->where('u.id', '=', $id)
                         ->first();
    
        return $data;
    }

    public function findUserByID($id)
    {
        $data = $this->db->select('password')
                        ->table('users')
                        ->where('id', '=', $id)
                         ->first();
    
        return $data;
    }

    public function findUserByEmail($email)
    {
        $result =$this->db->table('users')->where('email', ' = ', $email)->first();
        return $result;
    }

    public function findUser($field, $value)
    {
        $result =$this->db->table('users')->where($field, ' = ', $value)->first();
        return $result;
    }

    public function insertUser($data)
    {
        $this->db->table('users')->insert($data);
    }

    public function updateUser($data, $id)
    {
        $this->db->table('users')->where('id', '=', $id)->update($data);
    }

    // public function deleteUser($id)
    // {
    //     $this->db->table('images')->where('id', '=', $id)->delete();

    //     $this->db->table('users')->where('id', '=', $id)->delete();
    // }
}