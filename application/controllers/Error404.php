<?php
// Controlador de página de error 404
if (!defined('BASEPATH'))
   exit('No direct script access allowed');
class Error404 extends CI_Controller { 
   public function index(){
      $this -> load -> view ('tareas/header');
      $this -> load -> view ('tareas/error404');
      $this -> load -> view ('tareas/footer');
   }
}