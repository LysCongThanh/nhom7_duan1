<?php
//Orders Model
class CartModel extends Model {
    private $_table = 'cart', $_field = '*';

    function tableFill(){
       return 'cart';
    }

    function fieldFill(){
        return '*';
    }

    function primaryKey(){
        return 'id';
    }
    function getListOrders(){
        $data = $this->db->query("SELECT $this->_field FROM $this->_table")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function remove($id)
    {
        $this->db->table('carts')->where('id', '=', $id)->delete();
    }

    public function addCartList($data)
    {
        $this->db->table('carts')->insert($data);
    }

    public function listCart($id)
    {
        $data = $this->db->select('carts.book_id, carts.id')
        ->table('carts')
        ->where('user_id', '=', $id)
        ->get();
        return $data;
    }

    public function updateCart($data, $id)
    {
        $result = $this->db
        ->table('carts')
        ->where('id', '=', $id)
        ->update($data);
        return $result;
    }

    public function updateCartReduce($id)
    {
        $qat = ["quantity" => "quantity - 1"];
        $data = $this->db
        ->table('carts')
        ->where('id', '=', $id)
        ->update($qat);
        return $data;
    }


    public function getCartByUser($id)
    {
        $data = $this->db->select('carts.*, books.book_name, books.price, books.discount_price')->table('carts')
        ->join('books', 'books.id=carts.book_id')
        ->where('user_id', '=', $id)
        ->get();
        return $data;
    }

    public function sumary($id) {
        $data = $this->db->select("SUM(carts.quantity * books.price) as total,
        sum(carts.quantity * books.discount_price) as total_discount, 
        SUM(carts.quantity * books.price) - sum(carts.quantity * books.discount_price) total_price")
        ->table('carts')
        ->join('books', 'books.id = carts.book_id')
        ->where('carts.user_id', '=', $id)
        ->groupBy('carts.user_id')
        ->get();

        return $data;
    }
}
?>
