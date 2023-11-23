<?php

class PublishersModel extends Model {
    private $_table = 'publishers', $_field = '*';
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

    public function getList()
    {
        $data = $this->db->query("SELECT $this->_field FROM $this->_table")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
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

    public function updatePublisher($data, $id)
    {
        $this->db->table('publishers')->where('id', '=', $id)->update($data);
    }

    public function deletePublisher($id) {
        $this->db->table($this->_table)->where('id', '=', $id)->delete();
    }
}