<?php
class ClientProductController extends Controller
{

    public $data = [];


     public function page()
        {
            $this->data['content'] = 'client/products/product_row';
            $this->render('layouts/client_layout', $this->data);
        }

     

    }