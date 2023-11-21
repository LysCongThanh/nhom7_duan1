<?php
class ClientProductsController extends Controller
{

    public $data = [];


    public function page()
    {
        $this->data['content'] = 'client/products/product_row';
        $this->render('layouts/client_layout', $this->data);
    }

    public function product_column()
    {
        $this->data['content'] = 'client/products/product_column';
        $this->render('layouts/client_layout', $this->data);
    }
    public function product_detail()
    {
        $this->data['content'] = 'client/products/product_detail';
        $this->render('layouts/client_layout', $this->data);
    }
}
