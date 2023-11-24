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

    function getListUsers(){
        $data = $this->db->query("SELECT $this->_field FROM $this->_table")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}