<?php
//ContactsModel Model
class ContactsModel extends Model {

    function tableFill(){
       return 'contacts';
    }

    function fieldFill(){
        return '*';
    }

    function primaryKey(){
        return 'id';
    }

    public function insertContact($data)
    {
        $this->db->table('contacts')->insert($data);
    }

}