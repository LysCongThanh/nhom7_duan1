<?php

class UsersModel extends Model {
    private $_table = 'users', $_field = '*';

    public function tableFill() {
        return 'users';
    }

    public function fieldFill() {
        return '*';
    }

    public function primaryKey() {
        return 'id';
    }

    public function getListUsers()
    {
        $data = $this->db->query("SELECT $this->_field FROM $this->_table")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getLatestId()
    {
        $data = $this->db->table('users')->orderBy('id', 'DESC')->first();
        return $data['id'] + 1;
    }
   

    public function getDetailUser($id)
    {
        $data = $this->db->select('u.*, c.tel, a.address')
                        ->table('users as u')
                        ->leftJoin('contacts as c', 'u.id = c.user_id')
                        ->leftJoin('addresses as a', 'a.user_id = u.id')
                        ->where('u.id', '=', $id)
                         ->first();
    
        return $data;
    }

    public function findUserByID($id)
    {
        $data = $this->db->select('password')
                        ->table('users')
                        ->where('id', '=', $id)
                         ->first();
    
        return $data;
    }

    public function findUserByEmail($email)
    {
        $result =$this->db->table('users')->where('email', ' = ', $email)->first();
        return $result;
    }

    public function findUser($field, $value)
    {
        $result =$this->db->table('users')->where($field, ' = ', $value)->first();
        return $result;
    }

    public function insertUser($data)
    {
        $this->db->table('users')->insert($data);
    }

    public function updateUser($data, $id)
    {
        $this->db->table('users')->where('id', '=', $id)->update($data);
    }

    // public function deleteUser($id)
    // {
    //     $this->db->table('images')->where('id', '=', $id)->delete();

    //     $this->db->table('users')->where('id', '=', $id)->delete();
    // }

    //Đếm số người dùng
    public function count_users(){
        $data = $this->db->select('COUNT(us.id) AS nguoidung')->table('users AS us')->first();
        return $data;
    }

    public function getProfile($id)
    {
        $data = $this->db->select('
        u.*,
        DATE(u.birthdate) as birthdate,
        a.address, 
        a.tel,
        a.specific_address,
        a.zip_code,
        a.id,
        COUNT(DISTINCT w.id) as total_wishlist,
        COUNT(DISTINCT o.id) as total_order,
        COUNT(DISTINCT CASE WHEN o.status = "Chưa Thanh Toán" THEN o.id END) as unpaid,
        COUNT(DISTINCT CASE WHEN o.status = "Đã Thanh Toán" THEN o.id END) as paid
        ')
        ->table('users as u')
        ->leftJoin('addresses as a', 'u.id = a.user_id')
        ->leftJoin('wishlist as w', 'u.id = w.user_id')
        ->leftJoin('orders as o', 'u.id = o.user_id')
        ->leftJoin('orders_detail as od', 'od.order_id = o.id')
        ->leftJoin('books as b', 'b.id = od.book_id')
        ->where('u.id', '=', $id)
        ->where('u.id', '=' , "(SELECT a.user_id FROM addresses AS a LIMIT 1)")
        ->groupBy('u.id,a.address,a.tel,a.specific_address,a.zip_code,a.id')
        ->orderBy('a.id', 'DESC')
        ->first();
        return $data;
    }

    public function showProfile($id){
        $data = $this->db->select('
        u.*,
        DATE(u.birthdate) as birthdate,
        COUNT(DISTINCT w.id) as total_wishlist,
        COUNT(DISTINCT o.id) as total_order,
        COUNT(DISTINCT CASE WHEN o.status = "Chưa Thanh Toán" THEN o.id END) as unpaid,
        COUNT(DISTINCT CASE WHEN o.status = "Đã Thanh Toán" THEN o.id END) as paid
        ')
        ->table('users as u')
        ->leftJoin('wishlist as w', 'u.id = w.user_id')
        ->leftJoin('orders as o', 'u.id = o.user_id')
        ->leftJoin('orders_detail as od', 'od.order_id = o.id')
        ->leftJoin('books as b', 'b.id = od.book_id')
        ->where('u.id', '=', $id)
        ->groupBy('u.id')
        ->first();
        return $data;

        
    }


    public function showAll($id)
    {
        $data = $this->db->select('o.id as order_id, u.id as user_id, b.book_name as book_name, i.slug as slug,od.quantity as quantity_product,o.status as order_status, o.created_at as order_date')
            ->table('orders as o')
            ->join('users as u', 'u.id = o.user_id')
            ->leftJoin('orders_detail as od', 'o.id = od.order_id')
            ->leftJoin('books as b', 'b.id = od.book_id')
            ->leftJoin('images as i', 'b.id = i.book_id') 
            ->where('u.id', '=', $id)
            ->where('i.image_main','=',1)
            ->get();
    
        return $data;
    }
}