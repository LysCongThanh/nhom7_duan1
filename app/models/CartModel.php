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

    public function deleteCartByUser($id)
    {
        $this->db->table('carts')->where('user_id', '=', $id)->delete();
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

    public function updateCart($id)
    {
        $qat = ["quantity" => "quantity + 1"];
        $data = $this->db
        ->table('carts')
        ->where('id', '=', $id)
        ->update($qat);
    }


    public function getCartByUser($id)
    {
        $data = $this->db->select('c.*, b.book_name, i.slug, b.price, b.discount_price')->table('carts as c')
        ->join('books as b', 'b.id=c.book_id')
        ->join('images as i', 'b.id=i.book_id')
        ->where('c.user_id', '=', $id)
        ->where('i.image_main', '=', '1')
        ->get();
        return $data;
    }
}
?>