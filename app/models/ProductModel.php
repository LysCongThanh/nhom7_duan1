<?php

class ProductModel extends Model
{
    private $_table = 'books';
    private $_field = '*';

    function tableFill()
    {
        return 'books';
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

}
