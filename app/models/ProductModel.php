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

    //Top Sản Phẩm Bán Chạy
    public function best_saler(){
        $data = $this->db->select('b.id, b.book_name as name, b.views as view,cm.rating as comment, SUM(od.quantity) as total')
        ->table('orders_detail as od')
        ->join('books as b', 'b.id=od.book_id')
        ->join('comments as cm', 'cm.book_id=b.id')
        ->groupBy('b.id')
        ->orderBy('total', 'DESC')
        ->limit(5)->get();
        return $data;
    }

}
