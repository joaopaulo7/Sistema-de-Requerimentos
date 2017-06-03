<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CriarFormularioVisita extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array("form","url"));
        $this->load->library("session");
        $this->load->model("VisitaModel");
        $this->load->library("form_validation");
        if(!$this->session->userdata("idUsuario")) {
            redirect("login");
        }
    }
    
    public function index() {
		$this->load->view('Entrou/requerirVisita');
    }
    
    public function fazerFormulario(){
    	$cadastro = $this->input->post();
		  
		  
		  
		 $cadastro['idFormulario'] = rand(0, 10000000);
		 $this->form_validation->set_data($cadastro);
	     $this->form_validation->set_rules("idFormulario", "Id Formulario", "is_unique[FormularioVisita.idFormulario]", array('is_unique' => 'Erro de aleatoriedade  no %s.'));
	     while(!$this->form_validation->run()) {
	  	    $cadastro['idFormulario'] = rand(0, 1000000);
			$this->form_validation->set_data($cadastro);
	 		$this->form_validation->set_rules("idFormulario", "Id Formulario", "is_unique[FormularioVisita.idFormulario]", array('is_unique' => 'Erro de aleatoriedade  no %s.'));
		 }
		  
		  
        $this->form_validation->set_data($cadastro);
        
        
        $this->form_validation->set_rules("tipo_visita", "Tipo de Visita", "required", array(
                'required' => 'Você não escreveu o %s.'));
              	  
      	  
        $this->form_validation->set_rules("data", "Data", "required", array(
                'required'      => 'Você não escreveu a %s.'));
                
                
        $this->form_validation->set_rules("transporte", "Transporte", "required", array(
                'required'      => 'Você não escreveu o %s.'));
        
        
        $this->form_validation->set_rules("horario_saida", "Horário De Saída", "required", array(
                'required'      => 'Você não escreveu o %s.'));
        
        
     	  $this->form_validation->set_rules("horario_chegada", "Horário De Chegada", "required", array(
     	        'required'      => 'Você não escreveu o %s.'));
     	        
     	  $this->form_validation->set_rules("justificativa", "Justificativa", "required", array(
                'required' => 'Você não escreveu a %s.'));
              	  
      	  
        $this->form_validation->set_rules("objetivo_geral", "Objetivo Geral", "required", array(
                'required'      => 'Você não escreveu o %s.'));
        
        
        $this->form_validation->set_rules("objetivo_especifico", "Objetivo Específico", "required", array(
                'required'      => 'Você não escreveu o %s.'));
        
        
     	  $this->form_validation->set_rules("descricao", "Descrição", "required", array(
     	        'required'      => 'Você não escreveu a %s.'));
        
        
        $this->form_validation->set_rules("avaliacao", "Avaliação", "required", array(
     	        'required'      => 'Você não escreveu a %s.'));
        
        
        if( $this->form_validation->run()) {
        		 $cadastro['data_preenchimento'] = string date ( string 'r' )
  	  	   	 $this->VisitaModel->setFormulario($cadastro);
      	    $this->load->view('Entrou/requisicaoEfetuada');
      	  }
      	else
        $this->load->view('Entrou/erroFomularioVisita');
	 }
}