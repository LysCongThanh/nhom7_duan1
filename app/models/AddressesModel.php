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
    public function getListAddresses($id) 
    {
        $data = $this->db
        ->table('addresses a')
        ->select('a.id, a.address, a.tel, a.zip_code, a.specific_address')
        ->leftJoin('users as u', 'u.id = a.user_id')
        ->where('u.id', '=', $id)
        ->get();
        return $data;
    }
    public function updateAddress($data, $id)
    {
        $this->db->table('addresses')->where('id', '=', $id)->update($data);
    }
    public function deleteAddress($id)
    {
        $this->db->table('addresses')->where('id', '=', $id)->delete();
    }
}