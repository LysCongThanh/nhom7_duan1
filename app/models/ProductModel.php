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
        return 'id_book';
    }


    public function getList()
    {
        $data = $this->db->query("SELECT $this->_field FROM $this->_table")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getLatestId()
    {
        $data = $this->db->query("SELECT MAX(id_book) AS latest_id FROM $this->_table")->fetch(PDO::FETCH_ASSOC);
        return $data['latest_id'] + 1;
    }

    public function getListProducts()
    {
        $data = $this->db->select($this->_field)->table('products as p')->join('categories as c', 'p.category_id = c.id')->get();
        return $data;
    }

    public function getListProductsCategories($id)
    {
        $data = $this->db->select($this->_field)->table('books as b')->join('categories as c', 'b.id_category = c.id_category')->where('b.id_category', '=', $id)->get();
        return $data;
    }

    public function getDetailProduct($id)
    {
        $data = $this->db->table('books')->where('id_book', '=', $id)->first();
        return $data;
    }

    public function insertProduct($data)
    {
        $this->db->table('books')->insert($data);
    }

    public function updateProduct($data, $id)
    {
        $this->db->table('products')->where('id', '=', $id)->update($data);
    }

    public function deleteProduct($id)
    {
        $this->db->table('products')->where('id', '=', $id)->delete();
    }
    public function count()
    {
        $data = $this->db->select('COUNT(id) As soLuong')->table('products')->get();
        return $data;
    }
}
