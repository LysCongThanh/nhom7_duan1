<?php
//ShippingModel Model
class ShippingModel extends Model {

    function tableFill(){
       return 'shipping';
    }

    function fieldFill(){
        return '*';
    }

    function primaryKey(){
        return 'id';
    }

    public function insertShipping($data)
    {
        $this->db->table('shipping')->insert($data);
    }
}