<?php

class CategoriesModel extends Model
{
    private $_table = 'categories';

    function tableFill()
    {
        return 'categories';

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

    public function getListCategories()
    {
        $data = $this->db->table('categories')->orderBy('id', 'DESC')->get();
        return $data;
    }

    public function getDetailCategories($id)
    {
        $data = $this->db->table('categories')->where('id', '=', $id)->first();
        return $data;
    }

    public function insertCategories($data)
    {
        $this->db->table('categories')->insert($data);
    }

    public function updateCategories($data, $id)
    {
        $this->db->table('categories')->where('id', '=', $id)->update($data);
    }

    public function deleteCategories($id)
    {
        $this->db->table('categories')->where('id', '=', $id)->delete();
    }

    public function count()
    {
        $data = $this->db->select('COUNT(id) As soLuong')->table('categories')->get();
        return $data;
    }

}
