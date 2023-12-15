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

    public function updateAddress($data,$id)
    {
        $this->db->table('addresses')->where('user_id', '=', $id)->update($data);
       
    }

    public function getAddresbyId($id)
    {
       $data = $this->db->select('address, specific_address')->table('addresses')->where('user_id', '=', $id)->get();
       return $data;
    }
}