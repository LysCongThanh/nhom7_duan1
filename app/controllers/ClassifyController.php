<?php 
//AuthorsController Controller
class ClassifyController extends Controller{
    
    public $data = [], $model = [], $authors, $publishers, $categories;
    
    public function __construct(){
        //construct
        $this->authors = $this->model('AuthorsModel');
        $this->publishers = $this->model('PublishersModel');
        $this->categories = $this->model('CategoriesModel');
    }
    

    public function list()
    {
        // $this->data['sub_content']['authors'] = $this->authors->getList();
        // $this->data['sub_content']['categories'] = $this->categories->getList();
        // $this->data['sub_content']['publishers'] = $this->publishers->getList();
        $this->data['sub_content']['title'] = 'Phân Loại';
        $this->data['content'] = 'admin/categories/list';

        $this->render('layouts/admin_layout', $this->data);
    }
    public function index(){
        //Index
    }
}