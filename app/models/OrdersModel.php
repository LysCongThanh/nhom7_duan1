<?php
//Orders Model
class OrdersModel extends Model {
    private $_table = 'orders', $_field = '*';

    function tableFill(){
       return 'orders';
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

    public function getOrders()
    {
        $data = $this->db->select($this->_field)->table('orders as o')->join('users as u', 'o.user_id = u.id')->get();
        return $data;
    }

    public function getOrdersDetail($id)
    {
        $data = $this->db->table('orders_detail')->where('id', '=', $id)->first();
        return $data;
    }
}
?>