<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Confirmacoes extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array("url","html"));
        $this->load->library("session");
        $this->load->model("ConfirmacoesModel");
        if(!$this->session->userdata("idUsuario")) {
            redirect("login");
        }
    }
    
    public function index(){
    	$funcao = $this->ConfirmacoesModel->getfuncao();
    	if($funcao!= 'professor')
    		$list['listavis'] = $this->ConfirmacoesModel->getListVis($funcao);
    		$list['listasubs'] = $this->ConfirmacoesModel->getListSubs();
		$this->load->view('Entrou/confirmacoes', $list);
    }
    
    public function logout(){
		redirect('login');
	}
	
}
