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


    public function rating($book_id)
    {
        $data = $this->db->select('c.*, u.name as name')
        ->table('comments as c')
        ->join('users as u', 'u.id = c.user_id')
        ->join('books as b', 'b.id = c.book_id')
        ->where('c.book_id', '=', $book_id)
            ->orderBy('c.id', 'DESC')
            ->get();

        return $data;
    }

    public function count_comments(){
        $data = $this->db->select('COUNT(cm.id) AS danhgia')->table('comments AS cm')->first();
        return $data;
    }

}