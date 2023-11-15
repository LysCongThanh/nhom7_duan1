<?php

class CategoriesModel extends Model {
    private $_table = 'categories';

    public function tableFill()
    {
        return 'categories';
    }

    public function fieldFill()
    {
        return '*';
    }

    public function primaryKey()
    {
        return 'id_category';
    }
}