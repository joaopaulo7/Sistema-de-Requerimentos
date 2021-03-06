<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array("url","html"));
        $this->load->library("session");
        $this->load->model("MenuModel");
        if(!$this->session->userdata("idUsuario")) {
            redirect("login");
        }
    }
    
    public function index() {
    		$dados['liberaAlt']= $this->MenuModel->getAlt();
			$this->load->view('Entrou/menu', $dados);
    }
    
    public function logout(){
		redirect('login');
	}
	
}
