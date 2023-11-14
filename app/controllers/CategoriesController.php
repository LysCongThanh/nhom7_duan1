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
        $this->data['sub_content']['categories'] = $this->categories;
        $this->data['sub_content']['script_src'] = 'classification-list';
        $this->data['content'] = 'admin/categories/list';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function add_categories() {
        $request = new Request;

        if($request->isPost()) {
            echo 123;
        }
    }
}