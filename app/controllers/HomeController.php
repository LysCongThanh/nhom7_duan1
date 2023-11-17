<?php
class HomeController extends Controller
{
    public $product, $data;

    public function __construct()
    {
        $this->product = $this->model('HomeModel');
    }

    public function index()
    {
       
        $this->data['content'] = 'client/home/index';
        $this->render('layouts/client_layout', $this->data);
    }

    public function shopping_cart(){
        $this->data['content'] = 'client/products/shopping_cart';
        $this->render('layouts/client_layout', $this->data);
    }

    public function payment(){
        $this->data['content'] = 'client/products/payment';
        $this->render('layouts/client_layout', $this->data);
    }

    public function contact(){
        $this->data['content'] = 'client/contact/contact';
        $this->render('layouts/client_layout', $this->data);
    }

    public function about(){
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