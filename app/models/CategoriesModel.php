<?php

class CategoriesModel extends Model {
    private $_table = 'categories';

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
        return 'id';
    }

    public function getListCategories()
    {
        $data = $this->db->table('categories')->orderBy('id', 'DESC')->get();
        return $data;
    }

    public function insertCategories($data)
    {
        $this->db->table('categories')->insert($data);
    }
}