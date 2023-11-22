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
        $data = $this->db->table('books')->orderBy('id_book', 'DESC')->first();
        return $data['id_book'] + 1;
    }
    public function getListProducts()
    {
        $data = $this->db->select('b.*, c.*, i.name')
                        ->table('books as b')
                        ->join('categories as c', 'b.id_category = c.id_category')
                        ->join('images as i', 'b.id_book = i.id_book')
                        ->where('i.image_main', '=', 1)
                        ->get();
        return $data;
    }

    public function getListProductsCategories($id)
    {
        $data = $this->db->select($this->_field)->table('books as b')->join('categories as c', 'b.id_category = c.id_category')->where('b.id_category', '=', $id)->get();
        return $data;
    }

    public function getDetailProduct($id)
    {
        $data = $this->db->select('b.*, c.*, i.name')
                        ->table('books as b')
                        ->join('categories as c', 'b.id_category = c.id_category')
                        ->join('images as i', 'b.id_book = i.id_book')
                        // ->join('authors as a', 'a.id_author = b.id_author')
                        // ->join('publishers as p', 'p.id_publisher = b.id_publisher')
                        ->where('i.image_main', '=', 1)
                        ->where('b.id_book', '=', $id)
                         ->first();
    
        return $data;
    }

    public function insertProduct($data)
    {
        $this->db->table('books')->insert($data);
    }

    public function updateProduct($data, $id)
    {
        $this->db->table('books')->where('id', '=', $id)->update($data);
    }

    public function deleteProduct($id)
    {
        $this->db->table('images')->where('id_book', '=', $id)->delete();

        $this->db->table('books')->where('id_book', '=', $id)->delete();
    }
    public function count()
    {
        $data = $this->db->select('COUNT(id) As soLuong')->table('products')->get();
        return $data;
    }
}
