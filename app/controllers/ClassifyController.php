<?php

class ClassifyController extends Controller
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
            $result = $this->categories->insertCategories($data);

            if (!$result) {
                // Nếu thành công, lưu thông báo và chuyển hướng đến danh sách danh mục
                Session::flash('msg', 'Thêm danh mục thành công');
                $response = new Response();
                $response->redirect('phan-loai');
            }
        }
    }

    public function add_author() {
        $request = new Request;
        if($request->isPost()) {
            $data = $request->getFields();
            $result = $this->authors->insertAuthor($data);

            if (!$result) {
                // Nếu thành công, lưu thông báo và chuyển hướng đến danh sách danh mục
                Session::flash('msg', 'Thêm tác giả thành công');
                $response = new Response();
                $response->redirect('phan-loai');
            }
        }
    }

    public function add_publisher() {
        $request = new Request;
        if($request->isPost()) {
            $data = $request->getFields();
            $result = $this->publishers->insertPublisher($data);

            if (!$result) {
                // Nếu thành công, lưu thông báo và chuyển hướng đến danh sách danh mục
                Session::flash('msg', 'Thêm nhà xuất bản thành công');
                $response = new Response();
                $response->redirect('phan-loai');
            }
        }
    }

    public function edit_category() {
        $request = new Request;
        if($request->isPost()) {
            $data = $request->getFields();
            $id = $request->getFields()['id'];
            $result = $this->categories->updateCategory($data, $id);

            if (!$result) {
                // Nếu thành công, lưu thông báo và chuyển hướng đến danh sách danh mục
                Session::flash('msg', 'Sửa danh mục thành công');
                $response = new Response();
                $response->redirect('phan-loai');
            }
        }
    }

    public function edit_author() {
        $request = new Request;
        if($request->isPost()) {
            $data = $request->getFields();
            $id = $request->getFields()['id'];
            $result = $this->authors->updateAuthor($data, $id);

            if (!$result) {
                // Nếu thành công, lưu thông báo và chuyển hướng đến danh sách danh mục
                Session::flash('msg', 'Sửa tác giả thành công');
                $response = new Response();
                $response->redirect('phan-loai');
            }
        }
    }

    public function edit_publisher() {
        $request = new Request;
        if($request->isPost()) {
            $data = $request->getFields();
            $id = $request->getFields()['id'];
            $result = $this->publishers->updatePublisher($data, $id);

            if (!$result) {
                // Nếu thành công, lưu thông báo và chuyển hướng đến danh sách danh mục
                Session::flash('msg', 'Sửa nhà xuất bản thành công');
                $response = new Response();
                $response->redirect('phan-loai');
            }
        }
    }

    public function delete_category() {
        $request = new Request;
        if($request->isPost()) {
            $id = $request->getFields()['id'];
            $result = $this->categories->deleteCategory($id);

            if(!$result) {
                Session::flash('msg', 'Xóa danh mục thành công !');
                $response = new Response();
                $response->redirect('phan-loai');
            }
        }
    }

    public function delete_author() {
        $request = new Request;
        if($request->isPost()) {
            $id = $request->getFields()['id'];
            $result = $this->authors->deleteAuthor($id);

            if(!$result) {
                Session::flash('msg', 'Xóa tác giả thành công !');
                $response = new Response();
                $response->redirect('phan-loai');
            }
        }
    }

    public function delete_publisher() {
        $request = new Request;
        if($request->isPost()) {
            $id = $request->getFields()['id'];
            $result = $this->publishers->deletePublisher($id);

            if(!$result) {
                Session::flash('msg', 'Xóa nhà xuất bản thành công !');
                $response = new Response();
                $response->redirect('phan-loai');
            }
        }
    }
}