<?php
//CommentsModel Model
class CommentsModel extends Model {

    private $_table = 'comments as c';
    private $_field = 'c.*, u.name as user_name, b.book_name as name_book';

    function tableFill(){
       return 'comments';
    }

    function fieldFill(){
        return '*';
    }

    function primaryKey(){
        return 'id';
    }

    public function getListComments()
    {
        $data = $this->db->select($this->_field)
        ->table($this->_table)
        ->join('users as u', 'u.id = c.user_id')
        ->join('books as b', 'b.id = c.book_id')
        ->where('role', '=', 0)
        ->get();

     return $data;
    }

    public function deleteComment($id)
    {
        $this->db->table('comments')->where('id', '=', $id)->delete();
    }

    public function insertComment($data)
    {
        $this->db->table('comments')->insert($data);
    }


}