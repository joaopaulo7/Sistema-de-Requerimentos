<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Listagem extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array("url","html"));
        $this->load->library("session");
        $this->load->model("ListagemModel");
        if(!$this->session->userdata("idUsuario")) {
            redirect("login");
        }
    }
    
    public function index(){
    	$funcao = $this->ListagemModel->getfuncao();
    	if($funcao!= 'Professor')
    		$list['listavis'] = $this->ListagemModel->getListVis($funcao);
    	$list['listasubs'] = $this->ListagemModel->getListSubs();
		$this->load->view('Entrou/listagem', $list);
    }
    
    public function logout(){
		redirect('login');
	}
	
}
