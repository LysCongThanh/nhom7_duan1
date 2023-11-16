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
        $this->data['sub_content']['authors'] = $this->authors->getListAuthors();
        $this->data['sub_content']['publishers'] = $this->publishers->getListPublishers();
        $this->data['sub_content']['categories'] = $this->categories->getListCategories();
        $this->data['sub_content']['script_src'] = 'classification-list';
        $this->data['content'] = 'admin/categories/list';
        $this->render('layouts/admin_layout', $this->data);
        $this->render('blocks/admin/script', $this->data['sub_content']);
    }

    public function add_category() {
        $request = new Request;
        if($request->isPost()) {
            $data = $request->getFields();
            var_dump($data);
            // $result = $this->categories->insertCategories($data);

            // if ($result) {
            //     // Nếu thành công, lưu thông báo và chuyển hướng đến danh sách danh mục
            //     Session::flash('msg', 'Thêm danh mục thành công');
            //     $response = new Response();
            //     $response->redirect('danh-sach-danh-muc');
            // }
        }
    }

    public function add_author() {
        //handle add author
    }

    public function add_publisher() {
        //handle add publisher
    }
}