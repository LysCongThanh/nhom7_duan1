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

}