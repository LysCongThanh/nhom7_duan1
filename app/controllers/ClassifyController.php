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

    public function page()
    {
        $this->data['sub_content']['authors'] = $this->authors->getListAuthors();
        $this->data['sub_content']['publishers'] = $this->publishers->getListPublishers();
        $this->data['sub_content']['categories'] = $this->categories->getListCategories();
        $this->data['sub_content']['script_src'] = 'classification-list';
        $this->data['content'] = 'admin/categories/list';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function add_category()
    {
        $request = new Request;
        if ($request->isPost()) {
            $referer = $request->getReferer();
            $refererPath = trim(parse_url($referer, PHP_URL_PATH), '/');
            $response = new Response();
            switch ($refererPath) {
                case 'phan-loai':
                    $data = $request->getFields();
                    $this->categories->insertCategories($data);

                    Session::flash('msg', 'Thêm danh mục thành công');
                    $response->redirect('phan-loai');
                    break;

                case 'them-san-pham':
                    $data = $request->getFields();
                    $dataConverted = [
                        'name' => $data['category_name'],
                        'status' => $data['status'],
                    ];
                    $this->categories->insertCategories($dataConverted);
                    $response->redirect('them-san-pham');
                    break;

                case 'sua-san-pham':
                    $data = $request->getFields(); 
                    $id = $data['id'];
                    $dataConverted = [
                        'name' => $data['name'],
                        'status' => $data['status']
                    ];
                    $result = $this->categories->insertCategories($dataConverted);
                    if(!$result) {
                        Session::flash('msg', 'Thêm danh mục thành công !');
                    } else {
                        Session::flash('msg', 'Thêm danh mục thất bại !');
                    }

                    $response->redirect("sua-san-pham?id=$id");
                    break;
            }
        }
    }

    public function add_author()
    {
        $request = new Request;
        if ($request->isPost()) {
            $referer = $request->getReferer();
            $refererPath = trim(parse_url($referer, PHP_URL_PATH), '/');
            $data = $request->getFields();
            $response = new Response;

            switch ($refererPath) {
                case 'phan-loai':
                    $dataConverted = [
                        'name' => $data['author_name'],
                        'bio' => $data['bio'],
                    ];
                    $this->authors->insertAuthor($dataConverted);
                    Session::flash('msg', 'Thêm tác giả thành công');
                    $response->redirect('phan-loai');

                    break;

                case 'them-san-pham':
                    $dataConverted = [
                        'name' => $data['author_name'],
                        'bio' => $data['bio'],
                    ];
                    $this->authors->insertAuthor($dataConverted);
                    Session::flash('msg', 'Thêm tác giả thành công');
                    $response->redirect('them-san-pham');
                    break;

                case 'sua-san-pham':
                    $id = $data['id'];
                    $dataConverted = [
                        'name' => $data['name'],
                        'bio' => $data['bio'],
                    ];
                    $this->authors->insertAuthor($dataConverted);
                    Session::flash('msg', 'Thêm tác giả thành công');
                    $response->redirect("sua-san-pham?id=$id");
                    break;
            }
        }
    }

    public function add_publisher()
    {
        $request = new Request;
        $response = new Response();
        if ($request->isPost()) {
            $referer = $request->getReferer();
            $refererPath = trim(parse_url($referer, PHP_URL_PATH), '/');
            $data = $request->getFields();
            Session::flash('msg', 'Thêm nhà xuất bản thành công');
            switch($refererPath) {
                case 'phan-loai':
                    $dataConverted = [
                        'name' => $data['publisher_name'],
                        'contact' => $data['publisher_contact'],
                        'address' => $data['publisher_address'],
                        'publication_date' => $data['publication_date'],
                    ];
                    $this->publishers->insertPublisher($dataConverted);
                    $response->redirect('phan-loai');
                    break;

                case 'them-san-pham':
                    $dataConverted = [
                        'name' => $data['publisher_name'],
                        'contact' => $data['publisher_contact'],
                        'address' => $data['publisher_address'],
                        'publication_date' => $data['publication_date'],
                    ];
                    $this->publishers->insertPublisher($dataConverted);
                    $response->redirect('them-san-pham');
                    break;

                case 'sua-san-pham':
                    $id = $data['id'];
                    $dataConverted = [
                        'name' => $data['name'],
                        'contact' => $data['contact'],
                        'address' => $data['address'],
                        'publication_date' => $data['date_publication']
                    ];
                    $this->publishers->insertPublisher($dataConverted);
                    $response->redirect("sua-san-pham?id=$id");
                    break;
            }
        }
    }

    public function edit_category()
    {
        $request = new Request;
        if ($request->isPost()) {
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

    public function edit_author()
    {
        $request = new Request;
        if ($request->isPost()) {
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

    public function edit_publisher()
    {
        $request = new Request;
        if ($request->isPost()) {
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

    public function delete_category()
    {
        $request = new Request;
        if ($request->isPost()) {
            $id = $request->getFields()['id'];
            $result = $this->categories->deleteCategory($id);

            if (!$result) {
                Session::flash('msg', 'Xóa danh mục thành công !');
                $response = new Response();
                $response->redirect('phan-loai');
            }
        }
    }

    public function delete_author()
    {
        $request = new Request;
        if ($request->isPost()) {
            $id = $request->getFields()['id'];
            $result = $this->authors->deleteAuthor($id);

            if (!$result) {
                Session::flash('msg', 'Xóa tác giả thành công !');
                $response = new Response();
                $response->redirect('phan-loai');
            }
        }
    }

    public function delete_publisher()
    {
        $request = new Request;
        if ($request->isPost()) {
            $id = $request->getFields()['id'];
            $result = $this->publishers->deletePublisher($id);

            if (!$result) {
                Session::flash('msg', 'Xóa nhà xuất bản thành công !');
                $response = new Response();
                $response->redirect('phan-loai');
            }
        }
    }

    public function categoriesStatistics() {
        header('Content-Type: application/json');
        $data = $this->categories->countProducts();
        echo json_encode($data);
    }
}
