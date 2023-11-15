<?php

class PublishersModel extends Model {
    private $_table = 'publishers';
    public function tableFill()
    {
        return 'publishers';
    }

    public function fieldFill()
    {
        return '*';
    }

    public function primaryKey()
    {
        return 'id_publisher';
    }

    public function getListPublishers()
    {   
        $data = $this->db->table('publishers')->orderBy('id_publisher', 'DESC')->get();
        return $data;
    }
}