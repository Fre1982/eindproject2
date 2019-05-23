<?php

class home_Controller extends TinyMVC_Controller
{
    public function index (){
        $db = new db();
        $this->db->checkLogin();
        if (checkLogin){
            $this->view->display('home_view');

        }else{
            $this->view->display('login_view');

        }
    }

}
