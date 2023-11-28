<?php
//AddressesModel Model
class AddressesModel extends Model {

    function tableFill(){
       return 'addresses';
    }

    function fieldFill(){
        return '*';
    }

    function primaryKey(){
        return 'id';
    }

    public function insertAddress($data)
    {
        $this->db->table('addresses')->insert($data);
    }
}