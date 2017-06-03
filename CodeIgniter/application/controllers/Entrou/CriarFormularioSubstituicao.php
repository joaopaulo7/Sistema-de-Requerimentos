<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CriarFormularioSubstituicao extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array("form","url"));
        $this->load->library("session");
        $this->load->model("SubstituicaoModel");
        $this->load->library("form_validation");
        if(!$this->session->userdata("idUsuario")) {
            redirect("login");
        }
    }
    
    public function index() {
		$this->load->view('Entrou/requerirSubs');
    }
    
    public function fazerFormulario(){
    	$cadastro = $this->input->post();
		  
		  
		  
		 $cadastro['idFormularioSubs'] = rand(0, 10000000);
		 $this->form_validation->set_data($cadastro);
	     $this->form_validation->set_rules("idFormularioSubs", "Id Formulario Subs", "is_unique[FormularioSubs.idFormularioSubs]", array('is_unique' => 'Erro de aleatoriedade  no %s.'));
	     while(!$this->form_validation->run()) {
	  	    $cadastro['idFormularioSubs'] = rand(0, 1000000);
			$this->form_validation->set_data($cadastro);
	 		$this->form_validation->set_rules("idFormularioSubs", "Id Formulario Subs", "is_unique[FormularioSubs.idFormularioSubs]", array('is_unique' => 'Erro de aleatoriedade  no %s.'));
		 }
		  
		  
        $this->form_validation->set_data($cadastro);
        
        
        $this->form_validation->set_rules("materia", "Materia", "required", array(
                'required' => 'Você não escreveu o %s.'));
              	  
      	  
        $this->form_validation->set_rules("professor_substituto", "Professor Substituto", "required", array(
                'required'      => 'Você não escreveu o %s.'));
                
                
        $this->form_validation->set_rules("motivo", "Motivo", "required", array(
                'required'      => 'Você não escreveu o %s.'));
        
        
        $this->form_validation->set_rules("data_da_substituicao", "Data Substituicao", "required", array(
                'required'      => 'Você não escreveu o %s.'));
        
        
     	$this->form_validation->set_rules("horario_substituicao", "Horario Substituicao", "required", array(
     	        'required'      => 'Você não escreveu o %s.'));
        
        
        if( $this->form_validation->run()) {
  	  	   	$this->SubstituicaoModel->setFormulario($cadastro);
      	    $this->load->view('Entrou/requisicaoEfetuada');
      	  }
      	else
        $this->load->view('Entrou/erroFomularioSubstituicao');
	 }
}
