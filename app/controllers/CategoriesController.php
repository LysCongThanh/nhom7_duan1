<?php

class CategoriesController extends Controller
{
    public $authors, $publishers, $categories, $data = [];

    public function __construct()
    {
        $this->authors = $this->model('AuthorsModel');
        $this->publishers = $this->model('PublishersModel');
        $this->categories = $this->model('CategoriesModel');
    }

    public function page() {
        $this->data['sub_content']['authors'] = $this->authors;
        $this->data['sub_content']['publishers'] = $this->publishers;
        $this->data['sub_content']['categories'] = $this->categories->getListCategories();
        $this->data['sub_content']['script_src'] = 'classification-list';
        $this->data['content'] = 'admin/categories/list';
        $this->render('layouts/admin_layout', $this->data);
        $this->render('blocks/admin/script', $this->data['sub_content']);
    }

    public function add_category() {
        //handle add category
    }

    public function add_author() {
        //handle add author
    }

    public function add_publisher() {
        //handle add publisher
    }
}