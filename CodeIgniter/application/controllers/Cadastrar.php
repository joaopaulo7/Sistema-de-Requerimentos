<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastrar extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array("form","url"));
        $this->load->library("session");
        $this->load->model("CadastrarModel");
        $this->load->library("form_validation");
        if($this->session->userdata("Login")) {
            redirect("menu");
        }
    }
    
    public function index() {
		$this->load->view('cadastrar');
    }
    
    public function fazerCadastro(){
    	$cadastro = $this->input->post();
		  
		  
		  
		  $cadastro['idUsuario'] = rand(0, 10000000);
		  $this->form_validation->set_data($cadastro);
		  $this->form_validation->set_rules("idUsuario", "Id Usuario", "is_unique[Usuario.idUsuario]", array('is_unique' => 'Erro de aleatoriedade  no %s.'));
		  while(!$this->form_validation->run()) {
		  	   $cadastro['idUsuario'] = rand(0, 1000000);
		  		$this->form_validation->set_data($cadastro);
		  		$this->form_validation->set_rules("idUsuario", "Id Usuario", "is_unique[Usuario.idUsuario]", array('is_unique' => 'Erro de aleatoriedade  no %s.'));
		  }
		  
		  
        $this->form_validation->set_data($cadastro);
        
        
        $this->form_validation->set_rules("nome", "Nome", "required", array(
                'required' => 'Você não escreveu o %s.'));
              	  
      	  
        $this->form_validation->set_rules("cadastro_identificador", "Cadastro Identificador", "required|is_unique[Pessoa.cadastro_identificador]", array(
                'required'      => 'Você não escreveu o %s.',
                'is_unique'     => 'Esse %s já existe.'));
                
                
        $this->form_validation->set_rules("departamento", "Departamento", "required", array(
                'required'      => 'Você não escreveu o %s.'));
        
        
        $this->form_validation->set_rules("funcao", "Função", "required", array(
                'required'      => 'Você não escreveu o %s.'));
        
        
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[Pessoa.email]', array(
                'required'      => 'Você não escreveu o %s.',
                'valid_email'   => 'Esse %s não é válido.',
                'is_unique'     => 'Esse %s já existe.'));
        
        
     	  $this->form_validation->set_rules("senha", "Senha", "required", array(
     	        'required'      => 'Você não escreveu o %s.'));
        
        
        $this->form_validation->set_rules('confsenha', 'Confirmar Senha', 'required|matches[senha]',array(
        	    'required'      => 'Você não escreveu o %s.',
        		'matches'       => 'As senhas não são iguais'));
        
        
        if( $this->form_validation->run()) {
      	    $cadastro["senha"] = sha1($cadastro["senha"]);
  	  	   	$this->CadastrarModel->setCadastro($cadastro);
      	    $this->load->view('cadastroEfetuado');
      	  }
      	else
        $this->load->view('erroCadastro');
	 }
}
