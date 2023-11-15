<?php
class ClientUserController extends Controller
{

    public $data = [];


     public function page()
        {
            $this->data['content'] = 'client/home/index';
            $this->render('layouts/client_layout', $this->data);
        }

    }