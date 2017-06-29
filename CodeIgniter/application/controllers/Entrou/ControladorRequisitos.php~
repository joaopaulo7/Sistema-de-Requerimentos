<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorRequisitos extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array("form","url"));
        $this->load->library("session");
        $this->load->model("ControladorModel");
        if(!$this->session->userdata("idUsuario")) {
            redirect("login");
        }
    }
    
    private function mandarEmailConfProf($id, $email){
		
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
						".anchor('Entrou/controladorRequisitos/confirmarProf/'.$id, 'Confirmar', 'Confirmar')."
					</body>
				</html>
				";
		
		
		$this->load->library("email");
		
    	$this->email->from('sistemarequerimentoscefetvga@gmail.com', 'Sistema Requerimentos CEFET -Varginha');
		$this->email->to($email);

		$this->email->subject('Confirmação de Professor Para Substuição');
		$this->email->message($html);

  		if (!$this->email->send()) {
			show_error($this->email->print_debugger()); 
	 	}
    }
        
    private function mandarEmailConfCoorSubs($id, $email){

		
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
						".anchor('Entrou/controladorRequisitos/confirmarCoorSubs/'.$id, 'Confirmar', 'Confirmar')."
					</body>
				</html>
				";
		
		
		$this->load->library("email");
		
    	$this->email->from('sistemarequerimentoscefetvga@gmail.com', 'Sistema Requerimentos CEFET -Varginha');
		$this->email->to($email);

		$this->email->subject('Confirmação de Coordenador para Substuição');
		$this->email->message($html);

  		if (!$this->email->send()) {
			show_error($this->email->print_debugger()); 
	 	}
    }
    
    private function mandarEmailConfCoorVis($id, $email){
		
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
						".anchor('Entrou/controladorRequisitos/confirmarCoorVis/'.$id, 'Confirmar', 'Confirmar')."
					</body>
				</html>
				";
		
		
		$this->load->library("email");
		
    	$this->email->from('sistemarequerimentoscefetvga@gmail.com', 'Sistema Requerimentos CEFET -Varginha');
		$this->email->to($email);

		$this->email->subject('Confirmação de Coordenador para Visita Tecnica');
		$this->email->message($html);

  		if (!$this->email->send()) {
			show_error($this->email->print_debugger()); 
	 	}
    }

    private function mandarEmailConfDirVis($id, $email){
		
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
						".anchor('Entrou/controladorRequisitos/confirmarDirVis/'.$id, 'Confirmar', 'Confirmar')."
					</body>
				</html>
				";
		
		
		$this->load->library("email");
		
    	$this->email->from('sistemarequerimentoscefetvga@gmail.com', 'Sistema Requerimentos CEFET -Varginha');
		$this->email->to($email);

		$this->email->subject('Confirmação de Diretor para Visita Tecnica');
		$this->email->message($html);

  		if (!$this->email->send()) {
			show_error($this->email->print_debugger()); 
	 	}
    }
        
    
	 public function criadoSubs($idform, $id){
	 		$confuser = $this->ControladorModel->getProfessor($id);
	 		$this->mandarEmailConfProf($idform, $confuser->email);
		    $this->load->view('Entrou/requisicaoEfetuada');
    }
    
    public function criadoVis($id){
	 		$confuser = $this->ControladorModel->getCoorVis($id);
	 		$this->mandarEmailConfCoorVis($id, $confuser->email);
		    $this->load->view('Entrou/requisicaoEfetuada');
    }
    
    
    public function confirmarProf($idform){
			$this->load->view('Entrou/confirmaFormSubs');
			if($this->input->post() != null)
				$this->confirmarProf0($idform);
	}
	
    public function confirmarProf0($idform){
	 		$this->ControladorModel->setProfessor($idform, $this->session->userdata('login'));
	 		$confuser = $this->ControladorModel->getCoorSubs($idform);
	 		$this->mandarEmailConfCoorSubs($idform, $confuser->email);
	 		$this->load->view('Entrou/requisicaoEfetuada');
    }
    
    
    public function confirmarCoorSubs($idform){
			$this->load->view('Entrou/confirmaFormSubs');
			if($this->input->post() != null)
			$this->confirmarCoorSubs0($idform);
	}
	
    public function confirmarCoorSubs0($idform){
	 		$this->ControladorModel->setCoorSubs($idform, $this->session->userdata('login'));
			$this->load->view('Entrou/requisicaoEfetuada');
	 		  
    }
    
    
    public function confirmarCoorVis($idform){
			$this->load->view('Entrou/confirmaFormSubs');
			if($this->input->post() != null)
			$this->confirmarCoorVis0($idform);
	}
	
	public function confirmarCoorVis0($idform){
	 		$this->ControladorModel->setCoorVis($idform, $this->session->userdata('login'));
	 		$confuser = $this->ControladorModel->getDirVis($idform);
	 		$this->mandarEmailConfDirVis($idform, $confuser->email);
	 		$this->load->view('Entrou/requisicaoEfetuada');
    }
    
  
    public function confirmarDirVis($idform){
			$this->load->view('Entrou/confirmaFormSubs');
			if($this->input->post() != null)
			$this->confirmarDirVis0($idform);
	}
	
	public function confirmarDirVis0($idform){
	 		$this->ControladorModel->setDirVis($idform, $this->session->userdata('login'));
	 		$this->load->view('Entrou/requisicaoEfetuada');
    }
 }
 
