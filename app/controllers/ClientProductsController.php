<?php
class ClientProductsController extends Controller
{

    public $data = [], $products;

    public function __construct()
    {
        $this->products = $this->model('ProductModel');
    }

    public function page()
    {
        $this->data['content'] = 'client/products/product_row';
        $this->render('layouts/client_layout', $this->data);
    }

    public function product_columns()
    {
        $this->data['sub_content']['product_column'] = $this->products->getProductColumn();
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

}
