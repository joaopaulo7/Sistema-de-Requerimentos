<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Manutencao extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array("form","url"));
        $this->load->library("session");
        $this->load->model("ManutencaoModel");
        $this->load->library("form_validation");
    }
    
    public $erro = "";
    	
    public function index() {
		    $this->load->view("Entrou/entrarManutencao", array( "erro" =>$this->erro));
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
    
    public function entrar(){
    	  $conf = $this->input->post();
    	  
		  $this->form_validation->set_data($conf);
		
		  $this->form_validation->set_rules('cadastro_identificador', 'Cadastro Identificador', 'required', array(
                'required'      => 'Você não escreveu o %s.'));
        
        
     	  $this->form_validation->set_rules("senha", "Senha", "required", array(
     	        'required'      => 'Você não escreveu o %s.'));
     	       
     	  if($this->form_validation->run()){
				  $conf['senha'] = sha1($conf['senha']);
				  redirect(base_url("Entrou/manutencao/entrou/".$conf['cadastro_identificador']."/".$conf['senha']));
		  }
		  else
				  $this->index();
		  }
    
    public function entrou($login, $senha){
		if($this->ManutencaoModel->confirma($login, $senha)){
			$info['login'] = $login;
			$info['email']= $this->ManutencaoModel->getEmail($login);
			$this->load->view('Entrou/manutencao', $info);
		}
		else{
			$this->erro = "Senha ou Usuário incorretos";
			$this->index();
		}
	}
    
    public function alterar(){
    	$dados = $this->input->post();
		  
		$this->form_validation->set_data($dados);
        
              	  
      	  
        $this->form_validation->set_rules('email', 'email', 'required|valid_email', array(
									'required'      => 'Você não escreveu o %s.',
              						 'valid_email'   => 'Esse %s não é válido.'));
              						 
        $this->form_validation->set_rules('outraSenha', 'outraSenha', 'min_length[7]', array(
                 					 'min_length'   =>  'A senha é muito pequena'));      
           
        $this->form_validation->set_rules('confsenha', 'confsenha', 'matches[outraSenha]',array(
        	   						'matches'       => 'As senhas não são iguais'));
        

        if($this->form_validation->run())
     	  {
        		if($dados['outraSenha']!="")
        		{
					$this->ManutencaoModel->setSenha(sha1($dados['outraSenha']),$dados['login']);
				}
        		else 
					$this->load->view('Entrou/manutencao', $dados);
        		if($dados['email']!=$this->ManutencaoModel->getEmail($dados['login']))
        		{
      		    	$this->mandarEmailConf( $this->session->userdata('idUsuario'), $dados['email']);
  	  		   	 	$this->ManutencaoModel->setEmail($dados['email'],$dados['login']);			 
        		}
        		$this->load->view('manutencaoEfetuada');	
		  }
		  else
			$this->load->view('Entrou/manutencao', $dados);
	 }
}
