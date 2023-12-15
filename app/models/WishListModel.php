<?php
//WishListModel Model
class WishListModel extends Model {

    function tableFill(){
       return 'wishlist';
    }

    function fieldFill(){
        return '*';
    }

    function primaryKey(){
        return 'id';
    }

    public function addWishList($data)
    {
        $this->db->table('wishlist')->insert($data);
    }
    public function getListWishList($id) 
    {
        $data = $this->db
        ->table('wishlist w')->select('w.id, w.book_id, b.book_name, b.price, i.slug')
        ->leftJoin('books as b', 'b.id = w.book_id')
        ->leftJoin('images as i', 'b.id = i.book_id')
        ->where('i.image_main', '=', '1')
        ->where('w.user_id', '=', $id)
        ->groupBy('w.book_id')
        ->get();
        return $data;
    }
    public function deleteWishList($id)
    {
        $this->db->table('wishlist')->where('id', '=', $id)->delete();
    }

}