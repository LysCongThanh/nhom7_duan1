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

}