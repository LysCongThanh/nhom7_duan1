<?php

class UsersModel extends Model {
    private $_table = 'users', $_field = '*';

    public function tableFill() {
        return 'users';
    }

    public function fieldFill() {
        return '*';
    }

    public function primaryKey() {
        return 'id';
    }

    public function getListUsers(){
        $data = $this->db->query("SELECT $this->_field FROM $this->_table")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    //Đếm số người dùng
    public function count_users(){
        $data = $this->db->select('COUNT(us.id) AS nguoidung')->table('users AS us')->first();
        return $data;
    }
}