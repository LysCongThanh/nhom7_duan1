<?php

class CategoriesModel extends Model {
    private $_table = 'categories', $_field = '*';


    public function tableFill()
    {
        return 'categories';
    }

    public function fieldFill()
    {
        return '*';
    }

    public function primaryKey()
    {
        return 'id_category';
    }

    public function getList()
    {
        $data = $this->db->query("SELECT $this->_field FROM $this->_table")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getListCategories()
    {
        $data = $this->db->table('categories')->orderBy('id_category', 'DESC')->get();
        return $data;
    }
}