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
        return 'id';
    }

    public function getListPublishers()
    {   
        $data = $this->db->table('publishers')->orderBy('id', 'DESC')->get();
        return $data;
    }
}