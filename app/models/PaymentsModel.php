<?php
//PaymentsModel Model
class PaymentsModel extends Model {

    function tableFill(){
       return 'payments';
    }

    function fieldFill(){
        return '*';
    }

    function primaryKey(){
        return 'id';
    }

    public function insertPayment($data)
    {
        $this->db->table('payments')->insert($data);
    }
    public function deletePayment($id)
    {
        $this->db->table('payments')->where('order_id', '=', $id)->delete();
    }

}