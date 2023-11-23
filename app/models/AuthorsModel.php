<?php

class AuthorsModel extends Model {
    private $_table = 'authors', $_field = '*';
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
        return 'id';
    }

    public function getList()
    {
        $data = $this->db->query("SELECT $this->_field FROM $this->_table")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getListAuthors()
    {   
        $data = $this->db->table('authors')->orderBy('id', 'DESC')->get();
        return $data;
    }

    public function insertAuthor($data)
    {
        $this->db->table('authors')->insert($data);
    }

    public function updateAuthor($data, $id)
    {
        $this->db->table($this->_table)->where('id', '=', $id)->update($data);
    }

    public function deleteAuthor($id) {
        $this->db->table($this->_table)->where('id', '=', $id)->delete();
    }
}