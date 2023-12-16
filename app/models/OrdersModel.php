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

    public function insertOrder($data)
    {
        $this->db->table('orders')->insert($data);
        return $this->db->lastId();
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

    public function getOrderDetail($id)
    {
        $data = $this->db->select('total_price')
        ->table('orders')
        ->where('id', '=', $id)
        ->first();

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

    public function getLastIdOrder()
    {
        $data = $this->db->select('id')
        ->table('orders')
        ->lastId()
        ->first();
        return $data;
    }

    public function getOrdersNew()
    {
        $data = $this->db->select('od.id as ID, o.created_at as dayOrder, a.address, s.shipping_cost, a.specific_address, a.tel, a.zip_code, b.book_name as name_book, o.status as trangThai, u.name as name_user, u.email as email, o.total_price as total')
        ->table('orders_detail as od')
        ->join('orders as o', 'o.id=od.order_id')
        ->join('users as u', 'u.id=o.user_id')
        ->join('addresses as a', 'u.id=a.user_id')
        ->join('books as b', 'b.id=od.book_id')
        ->join('shipping as s', 'o.id=s.order_id')
        ->join('payments as p', 'p.order_id=o.id')
        ->where('u.id', '=' , "(SELECT a.user_id FROM addresses AS a LIMIT 1)")
        ->limit(1)
        ->first();
        return $data;
    }
    public function getOrderById($id)
    {
        $data = $this->db->select('od.id as ID, o.created_at as dayOrder, a.address, s.shipping_cost, a.specific_address, a.tel, a.zip_code, b.book_name as name_book, o.status as trangThai, u.name as name_user, u.email as email, o.total_price as total')
        ->table('orders_detail as od')
        ->join('orders as o', 'o.id=od.order_id')
        ->join('users as u', 'u.id=o.user_id')
        ->join('addresses as a', 'u.id=a.user_id')
        ->join('books as b', 'b.id=od.book_id')
        ->join('shipping as s', 'o.id=s.order_id')
        ->join('payments as p', 'p.order_id=o.id')
        ->where('u.id', '=' , "(SELECT a.user_id FROM addresses AS a LIMIT 1)")
        ->where('o.id', '=', $id)
        ->first();
        return $data;
    }
    public function updateOrder($data, $id)
    {
        $this->db->table('orders')->where('id', '=', $id)->update($data);
    }
    public function deleteOrder($id)
    {
        $this->db->table('orders')->where('id', '=', $id)->delete();
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

    public function statisticsByMonth() {
        $data = $this->db->select('MONTH(created_at) AS monthNumber, SUM(total_price) AS totalPrice')
        ->table('orders')
        ->groupBy('MONTH(created_at)')
        ->get();

        return $data;
    }

    public function newsOrders($status) {
        $query = $this->db->select('o.*, u.name as name')
        ->table('orders as o')
        ->join('users as u', 'u.id=o.user_id')
        ->limit(5);
       
        if ($status !== 'All') {
            $query->where('status', '=', $status);
        }
    
        $data = $query->orderBy('created_at', 'DESC')
            ->get();
    
        return $data;
    }

    
}
?>