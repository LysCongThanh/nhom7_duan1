<?php 

class TestController extends Controller {

    public $data = [];

    public function test() {

        $this->data['content'] = 'admin/products/list';
        $this->data['sub_content']['script_src'] = 'products_list';
        $this->data['sub_content']['asd'] = '';
        $this->render('layouts/admin_layout', $this->data);
        $this->render('blocks/admin/script', $this->data['sub_content']);
    }

}