<?php 
//CartController Controller
class CartController extends Controller{
    
    public $data = [], $model = [];
    
    public function __construct(){
        //construct
    }
    
    public function index(){
        //Index
    }

    public function page()
    {
        $this->data['content'] = 'client/products/shopping_cart';
        $this->render('layouts/client_layout', $this->data);
    }
}