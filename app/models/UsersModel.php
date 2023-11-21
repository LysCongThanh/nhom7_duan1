<?php

class UsersModel extends Model
{
    private $_table = 'users';

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
        $data = $this->db->query("SELECT * FROM $this->_table")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getListUsers()
    {
        $data = $this->db->table('users')->orderBy('id', 'DESC')->get();
        return $data;
    }

    public function getDetailUsers($id)
    {
        $data = $this->db->table('users')->where('id', '=', $id)->first();
        return $data;
    }

    public function findUserByEmail($email)
    {
        $result =$this->db->table('users')->where('email', ' = ', $email)->first();
        return $result;
    }
    public function insertUsers($data)
    {
        $this->db->table('users')->insert($data);
    }

    public function updateUsers($data, $id)
    {
        $this->db->table('users')->where('id', '=', $id)->update($data);
    }

    public function deleteUsers($id)
    {
        $this->db->table('users')->where('id', '=', $id)->delete();
    }

    public function count()
    {
        $data = $this->db->select('COUNT(id) As soLuong')->table('users')->get();
        return $data;
    }

}
