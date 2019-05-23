<?php

/*
 * @package Tiny?VC
 *
 */

class update_Controller extends TinyMVC_Controller
{
  public function index (){
  $db = new db('localhost', 'root', '', 'klanten');
  $result_contacten = $db->getAllData("contacten");
  $result_bedrijven = $db->getAllData("bedrijven");
  var_dump($result_contacten);
  }

}
