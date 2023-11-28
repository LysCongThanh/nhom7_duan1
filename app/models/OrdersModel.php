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
        $data = $this->db->select('der.id as ID, der.created_at as dayOrder,der.status as trangThai, u.name as name_user, b.book_name as name_book,od.quantity as soLuong, der.total_price as total')
        ->table('orders as der')
        ->leftJoin('users as u', 'der.user_id = u.id')
        ->leftJoin('orders_detail as od', 'od.order_id=der.id')
        ->leftJoin('books as b', 'b.id=od.book_id')
        ->groupBy('der.id')
        ->get();
        return $data;
    }

    public function getOrdersDetail($id)
    {
        $data = $this->db->select('od.id as ID, o.created_at as dayOrder, b.book_name as name_book, o.status as trangThai, u.name as name_user, u.email as email, b.price as price, o.total_price as total')
        ->table('orders_detail as od')
        ->join('orders as o', 'o.id=od.order_id')
        ->join('users as u', 'u.id=o.user_id')
        ->join('books as b', 'b.id=od.book_id')
        ->where('od.id', '=', $id)
        ->first();
        return $data;
    }

    //Tổng doanh thu
    public function count_totalPrice()
    {
        $data = $this->db->select('SUM(der.total_price) AS doanhthu')->table('orders AS der')->first();
        return $data;
    }

    //Tổng giao dịch
    public function count_order()
    {
        $data = $this->db->select('COUNT(der.id) AS giaodich')->table('orders AS der')->first();
        return $data;
    }

    //Bán Phiếu Giảm Giá
    public function count_discount(){
        $data = $this->db->select('SUM(od.discount) as giamgia')->table('orders_detail as od')->first();
        return $data;
    }
}
?>