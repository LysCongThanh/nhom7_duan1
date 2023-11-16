<?php

class AuthorsModel extends Model {
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
        return 'id';
    }

    public function getListAuthors()
    {   
        $data = $this->db->table('authors')->orderBy('id', 'DESC')->get();
        return $data;
    }
}