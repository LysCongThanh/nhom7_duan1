<?php
//OrderDetailModel Model
class OrderDetailModel extends Model {

    function tableFill(){
       return 'orders_detail';
    }

    function fieldFill(){
        return '*';
    }

    function primaryKey(){
        return 'id';
    }

    public function insertOrderDetail($data)
    {
        $this->db->table('orders_detail')->insert($data);
        return $this->db->lastId();
    }
}