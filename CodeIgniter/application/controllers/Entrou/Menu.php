<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array("url","html"));
        $this->load->library("session");
        if(!$this->session->userdata("idUsuario")) {
            redirect("login");
        }
    }
    
    public function index() {
		$this->load->view('Entrou/menu');
    }
    
    public function logout(){
		redirect('login');
	}
	
}
