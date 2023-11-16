<?php 

class DropZoneModel extends Model
{
    private $_table = 'authors';
    public function tableFill()
    {
        return 'authors';
    }

    public function fieldFill()
    {
        return '*';
    }

    public function primaryKey()
    {
        return 'id_author';
    }

}

?>