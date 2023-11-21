<?php
//ClassifyModel Model
class ClassifyModel extends Model {

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