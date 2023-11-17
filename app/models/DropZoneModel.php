<?php 

class DropZoneModel extends Model
{
    private $_table = 'images';
    public function tableFill()
    {
        return 'images';
    }

    public function fieldFill()
    {
        return '*';
    }

    public function primaryKey()
    {
        return 'id_image';
    }

    public function insertImages($data)
    {
        $this->db->table('images')->insert($data);
    }

}

?>