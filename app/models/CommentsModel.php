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
    
    public function ratings(){
        $data = $this->db->select('COUNT(cm.user_id) as rating')
        ->table('comments as cm')
        ->first();
        return $data;
    }
}