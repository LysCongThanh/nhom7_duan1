<?php 
//CommentsController Controller
class CommentsController extends Controller{
    
    public $data = [], $model = [];
    
    public function __construct(){
        //construct
    }
    
    public function index(){
        //Index
    }

    public function list()
    {
        
        $this->data['sub_content']['title'] = 'Danh Sách Bình Luận';
        $this->data['content'] = 'admin/comments/list';
        $this->render('layouts/admin_layout', $this->data);
    }
}