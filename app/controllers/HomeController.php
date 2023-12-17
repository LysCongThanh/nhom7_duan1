<?php
class HomeController extends Controller
{
    public $products, $data;

    public function __construct()
    {
        $this->products = $this->model('ProductModel');
    }

    public function index()
    {
        $this->data['sub_content']['categoriesPopular'] = $this->products->categoriesByRating();
        $this->data['sub_content']['discount'] = $this->products->topDiscount();
        $this->data['sub_content']['stars'] = $this->products->topStar();
        $this->data['sub_content']['views'] = $this->products->listTopView();
        $this->data['sub_content']['pds'] = $this->products->getListProducts();
        $this->data['content'] = 'client/home/index';
        $this->render('layouts/client_layout', $this->data);
    }

    public function shopping_cart(){
        $this->data['sub_content']['title'] = 'Giỏ Hàng';
        $this->data['content'] = 'client/products/shopping_cart';
        $this->render('layouts/client_layout', $this->data);
    }

    public function payment(){
        $this->data['sub_content']['title'] = 'Giỏ Hàng';
        $this->data['content'] = 'client/products/payment';
        $this->render('layouts/client_layout', $this->data);
    }

    public function contact(){
        $this->data['sub_content']['title'] = 'Giỏ Hàng';
        $this->data['content'] = 'client/contact/contact';
        $this->render('layouts/client_layout', $this->data);
    }

    public function about(){
        $this->data['sub_content']['title'] = 'Giỏ Hàng';
        $this->data['content'] = 'client/about/about';
        $this->render('layouts/client_layout', $this->data);
    }

    public function profile_main(){
        $this->data['content'] = 'client/profile/profile_main';
        $this->render('layouts/client_layout', $this->data);
    }

    public function profile_address(){
        $this->data['content'] = 'client/profile/profile_address';
        $this->render('layouts/client_layout', $this->data);
    }

    public function profile_order(){
        $this->data['content'] = 'client/profile/profile_order';
        $this->render('layouts/client_layout', $this->data);
    }

    public function profile_setting(){
        $this->data['content'] = 'client/profile/profile_setting';
        $this->render('layouts/client_layout', $this->data);
    }

    public function profile_wisthlist(){
        $this->data['content'] = 'client/profile/profile_wishlist';
        $this->render('layouts/client_layout', $this->data);
    }

    public function sign_in(){
        $this->data['content'] = 'client/login/sign_in';
        $this->render('layouts/client_layout', $this->data);
    }
    public function sign_up(){
        $this->data['content'] = 'client/login/sign_up';
        $this->render('layouts/client_layout', $this->data);
    }

}