<?php

class delete_Controller extends TinyMVC_Controller
{
    public function index(){
        $this->load->model('db','db');
        $this->db->deleteDataById();

    }

}
