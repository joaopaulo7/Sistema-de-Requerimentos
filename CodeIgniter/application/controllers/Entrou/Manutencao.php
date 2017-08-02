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
        if(!$this->session->userdata("idUsuario")) {
            redirect("login");
        }
    }
    
    public function index() {
    	$info['email']= $this->ManutencaoModel->getEmail();
		$this->load->view('Entrou/manutencao', $info);
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
    
    public function alterar(){
    	  $dados = $this->input->post();
		  
		   
        $this->form_validation->set_data($dados);
        
              	  
      	  
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email'/*|is_unique[Pessoa.email]'*/, array(
                'required'      => 'Você não escreveu o %s.',
                'valid_email'   => 'Esse %s não é válido.'
                //,'is_unique'     => 'Esse %s já existe.'
                ));
                   
           
        $this->form_validation->set_rules('confsenha', 'Confirmar Nova Senha', 'matches[outraSenha]',array(
        		   						'matches'       => 'As senhas não são iguais'));
        
        $this->form_validation->set_rules("senha", "senha", "required", array(
                'required'      => 'Você não escreveu o %s.'));
        

        if($this->form_validation->run())
     	  {
     	  	 $dados["senha"] = sha1($dados["senha"]);
          $resultado = $this->ManutencaoModel->verificaAcesso($dados);
        	 if(count($resultado) == 1) 
        	 {
        			 if($dados['outraSenha']!="")
        			 {

        		   						
        		   		if($this->form_validation->run()){			
					 				$this->ManutencaoModel->setSenha(sha1($dados['outraSenha']));
					 	   }		 
        					else 
        			 	   		$this->load->view('Entrou/erroManutencao');
        			 }
        			 if($dados['email']!=$this->ManutencaoModel->getEmail())
        			 {
      		    		$this->mandarEmailConf( $this->session->userdata('idUsuario'), $dados['email']);
  	  		   	 		$this->ManutencaoModel->setEmail($dados['email']);			 
        			 }
        			 $this->load->view('manutencaoEfetuada');	
      	 }
      	 else
             $this->index();
        }
        else
             $this->load->view('Entrou/erroManutencao',array('email' => $this->ManutencaoModel->getEmail()));
	 }
}