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
    	if($funcao!= 'Professor')
    		$list['listavis'] = $this->ConfirmacoesModel->getListVis($funcao);
    		$list['listasubs'] = $this->ConfirmacoesModel->getListSubs();
		$this->load->view('Entrou/confirmacoes', $list);
    }
    
    public function confVis($idform){
    	$funcao = $this->ConfirmacoesModel->getfuncao();
    	if($funcao == "Diretor")
    		redirect("Entrou/controladorRequisitos/confirmarDirVis/".$idform);
		if($funcao == "Coordenador")
    		redirect("Entrou/controladorRequisitos/confirmarCoorVis/".$idform);
    }
    
	 public function confSubs($idform){
	 	$funcao = $this->ConfirmacoesModel->getfuncao();
    	if($this->ConfirmacoesModel->isProf($idform))
    		redirect("Entrou/controladorRequisitos/confirmarProf/".$idform);
    	else {
    		if($funcao == "Coordenador")
    			redirect("Entrou/controladorRequisitos/confirmarCoorSubs/".$idform);
    	}
    }
    public function pdfSubs($id) {
    	$formulario['form'] = $this->ConfirmacoesModel->getFormSubs($id);
    	$this->load->view('Entrou/pdfSubs', $formulario);
    }
    
    public function pdfVis($id) {
    	$formulario['form'] = $this->ConfirmacoesModel->getFormVis($id);
    	$this->load->view('Entrou/pdfVis', $formulario);
    }
}
