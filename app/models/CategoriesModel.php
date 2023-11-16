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
        return 'id_category';
    }

    public function getListCategories()
    {
        $data = $this->db->table('categories')->orderBy('id_category', 'DESC')->get();
        return $data;
    }
}