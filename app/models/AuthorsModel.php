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
        return 'id_author';
    }

    public function getListAuthors()
    {   
        $data = $this->db->table('authors')->orderBy('id_author', 'DESC')->get();
        return $data;
    }
}