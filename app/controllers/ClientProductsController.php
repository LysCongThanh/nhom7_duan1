<?php
class ClientProductsController extends Controller
{

    public $data = [], $products, $categories, $publisher, $authors;

    public function __construct()
    {
        $this->products = $this->model('ProductModel');
        $this->categories = $this->model('CategoriesModel');
        $this->publisher = $this->model('PublishersModel');
        $this->authors = $this->model('AuthorsModel');
    }

    public function page()
    {
        $this->data['content'] = 'client/products/product_row';
        $this->render('layouts/client_layout', $this->data);
    }

    public function product_columns()
    {
        $this->data['sub_content']['product_column'] = $this->products->getProductColumn();
        $this->data['sub_content']['categories'] = $this->categories->getList();
        $this->data['sub_content']['publisher'] = $this->publisher->getList();
        $this->data['sub_content']['authors'] = $this->authors->getList();
        $this->data['sub_content']['getPrice'] = $this->products->getPrice();

        $this->data['sub_content']['title'] = 'Sản Phẩm Ngang';
        $this->data['content'] = 'client/products/product_column';
        $this->render('layouts/client_layout', $this->data);
    }
    public function product_detail()
    {
        $this->data['content'] = 'client/products/product_detail';
        $this->render('layouts/client_layout', $this->data);
    }
    public function detail()
    {
        $request = new Request();
        $id = $request->getFields();
        $this->data['sub_content']['pds'] = $this->products->getDetailProduct($id['id']);
        $this->data['content'] = 'client/products/product_detail';
        $this->render('layouts/client_layout', $this->data);
    }

    // Tìm Kiếm
    public function search()
    {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $this->data['sub_content']['search'] = $this->products->searchProduct($search);
            $this->data['sub_content']['categories'] = $this->categories->getList();
            $this->data['sub_content']['publisher'] = $this->publisher->getList();
            $this->data['sub_content']['authors'] = $this->authors->getList();
            $this->data['sub_content']['getPrice'] = $this->products->getPrice();
            $this->data['content'] = 'client/search/search';
            $this->render('layouts/client_layout', $this->data);
        }
    }

    //Lọc sản phẩm
    public function filter()
    {
        $request = new Request();
        $filter = $request->getFields();
        header('Content-Type: application/json');

        $data = $this->products->filterBooks($filter);

        echo json_encode($data);
        exit;
    }

}
