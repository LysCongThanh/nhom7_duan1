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
        $data = $this->db->table('books')->lastId();
        return $data;
    }

    public function getProductColumn()
    {
        $data = $this->db->select('b.*, i.name as img, c.name as categorie, cm.rating as ratings')
        ->table('books as b')
        ->leftJoin('images as i', 'b.id=i.book_id')
        ->leftJoin('categories as c', 'c.id=b.category_id')
        ->leftJoin('comments as cm', 'cm.book_id=b.id')
        ->groupBy('b.id')
        ->get();
        return $data;
    }

    public function getListProducts()
    {
        $data = $this->db->select('b.*, c.*, MAX(i.name) as image_name, b.id as book_id, c.name as name_category, MAX(i.slug) as image_slug')
        ->table('books as b')
        ->join('categories as c', 'b.category_id = c.id')
        ->join('authors as a', 'a.id = b.author_id')
        ->join('publishers as p', 'p.id = b.publisher_id')
        ->leftJoin('images as i', 'b.id = i.book_id')
        ->groupBy('b.id', 'c.id', 'a.id', 'p.id', 'c.name')
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
        $data = $this->db->select('
        b.*, 
        b.id as book_id, i.name as image_name,
        c.* 
        ')
        ->table('books as b')
        ->join('categories as c', 'b.category_id = c.id')
        ->join('authors as a', 'a.id = b.author_id')
        ->join('publishers as p', 'p.id = b.publisher_id')
        ->join('images as i', 'b.id = i.book_id')
        ->where('b.id', '=', $id)
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
        $this->db->table('books')->where('id', '=', $id)->delete();
    }
    public function count()
    {
        $data = $this->db->select('COUNT(id) As soLuong')->table('products')->get();
        return $data;
    }

    //Top Sản Phẩm Bán Chạy
    public function best_saler(){
        $data = $this->db->select('b.id, b.book_name as name, b.views as view,cm.rating as comment, SUM(od.quantity) as total')
        ->table('orders_detail as od')
        ->join('books as b', 'b.id=od.book_id')
        ->join('comments as cm', 'cm.book_id=b.id')
        ->groupBy('b.id')
        ->limit(5)->get();
        return $data;
    }
}
