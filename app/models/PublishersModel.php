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

    public function insertPublisher($data)
    {
        $this->db->table('publishers')->insert($data);
    }

    public function deletePublisher($id) {
        $this->db->table($this->_table)->where('id', '=', $id)->delete();
    }
}