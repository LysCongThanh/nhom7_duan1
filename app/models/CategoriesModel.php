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
        return 'id';
    }

    public function getList()
    {
        $data = $this->db->query("SELECT $this->_field FROM $this->_table")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
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

    public function updateCategory($data, $id) {
        $this->db->table('categories')->where('id', '=', $id)->update($data);
    }

    public function deleteCategory($id) {
        $this->db->table($this->_table)->where('id', '=', $id)->delete();
    }
}