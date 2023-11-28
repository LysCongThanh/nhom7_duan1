<?php
//CommentsModel Model
class CommentsModel extends Model {

    function tableFill(){
       return 'table_here';
    }

    function fieldFill(){
        return '*';
    }

    function primaryKey(){
        return 'id';
    }

    public function count_comments(){
        $data = $this->db->select('COUNT(cm.id) AS danhgia')->table('comments AS cm')->first();
        return $data;
    }

}