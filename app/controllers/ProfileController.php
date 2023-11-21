<?php 
//ProfilesController Controller
class ProfileController extends Controller{
    
    public $data = [], $model = [];
    
    public function __construct(){
        //construct
    }
    
    public function index(){
        //Index
    }
    public function main(){
        $this->data['content'] = 'client/profile/profile_main';
        $this->render('layouts/client_layout', $this->data);
    }
    public function address(){
        $this->data['content'] = 'client/profile/profile_address';
        $this->render('layouts/client_layout', $this->data);
    }
    public function setting(){
        $this->data['content'] = 'client/profile/profile_setting';
        $this->render('layouts/client_layout', $this->data);
    }
    public function orders(){
        $this->data['content'] = 'client/profile/profile_order';
        $this->render('layouts/client_layout', $this->data);
    }

    public function wishlist(){
        $this->data['content'] = 'client/profile/profile_wishlist';
        $this->render('layouts/client_layout', $this->data);
    }
}