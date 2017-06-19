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
    
    public function mandarEmailConf($usuario, $email){
		
		$html = " <!DOCTYPE html>
				<!--
				To change this license header, choose License Headers in Project Properties.
				To change this template file, choose Tools | Templates
				and open the template in the editor.
				-->
				<html>
					<head>
						<title>Login Sis.Req</title>
						<meta charset='UTF-8'>
						<meta name='viewport' content='width=device-width, initial-scale=1.0'>
					</head>
					<body>
						<h1>Um cadastro foi efetuado nessa conta, <br>para confirmar, clique em 'Confirmar'</h1>
						".anchor('Cadastrar/confirmaEmail/'.$usuario, 'Confirmar', 'Confirmar')."
					</body>
				</html>
				";
		
		
		$this->load->library("email");
		
    	$this->email->from('sistemarequerimentoscefetvga@gmail.com', 'Sistema Requerimentos CEFET -Varginha');
		$this->email->to($email);

		$this->email->subject('Confirmação de Usuario');
		$this->email->message($html);

  		if (!$this->email->send()) {
			show_error($this->email->print_debugger()); 
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
        		$prof = $cadatro['professor_substituto'];
        		$cadatro['professor_substituto'] = null;
        		$this->SubstituicaoModel->setFormulario($cadastro);
        		redirect('Entrou/controladorRequisitos/criadoSubs/'.$cadastro['idFormularioSubs'].'/'.$prof);
        }
        else
        		$this->load->view('Entrou/erroFomularioSubstituicao');
	 }
}
