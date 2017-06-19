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
    
    public function mandarEmailConfProf($id, $email){
		
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

		$this->email->subject('Confirmação de Usuario');
		$this->email->message($html);

  		if (!$this->email->send()) {
			show_error($this->email->print_debugger()); 
	 	}
    }
        
    public function mandarEmailConfCoorSubs($id, $email){

		
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

		$this->email->subject('Confirmação de Usuario');
		$this->email->message($html);

  		if (!$this->email->send()) {
			show_error($this->email->print_debugger()); 
	 	}
    }
    
    public function mandarEmailConfCoorVis($id, $email){
		
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

		$this->email->subject('Confirmação de Usuario');
		$this->email->message($html);

  		if (!$this->email->send()) {
			show_error($this->email->print_debugger()); 
	 	}
    }

    public function mandarEmailConfDirVis($id, $email){
		
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

		$this->email->subject('Confirmação de Usuario');
		$this->email->message($html);

  		if (!$this->email->send()) {
			show_error($this->email->print_debugger()); 
	 	}
    }
        
    
	 public static function criadoSubs($idform, $id){
	 		$confuser = $this->ControladorModel->getProfessor($id);
	 		$this->mandarEmailConfProf($idform, $confuser->email);
		   $this->load->view('Entrou/requisicaoEfetuada');
    }
    
    public function criadoVis($id){
	 		$confuser = $this->ControladorModel->getCoorVis($id);
	 		$this->mandarEmailConfCoorVis($confuser['id'], $confuser['email']);
		   $this->load->view('Entrou/requisicaoEfetuada');
    }
    
    
    public function confirmarProf($idform){
	 		$this->ControladorModel->setProfessor($idform, $this->session->userdata('login'));
	 		$confuser = $this->ControladorModel->getCoorSubs($idform);
	 		$this->mandarEmailConfCoorSubs($idform, $confuser->email);
	 		$this->load->view('Entrou/requisicaoEfetuada');
    }
    
    public function confirmarCoorSubs($idfor){
	 		$this->ControladorModel->setCoorSubs($idfor, $this->session->userdata('login'));
			$this->load->view('Entrou/requisicaoEfetuada');
	 		  
    }
    
    public function confirmarCoorVis($idfor){
	 		$this->ControladorModel->setCoorVis($idfor, $this->session->userdata('idUsuario'));
	 		$confuser = $this->ControladorModel->getDirVis($idfor);
	 		$this->mandarEmailConfDirVis($confuser['id'], $confuser['email']);
	 		$this->load->view('Entrou/requisicaoEfetuada');
    }
    
    public function confirmarDirVis($idfor){
	 		$this->ControladorModel->setDirVis($idfor, $this->session->userdata('idUsuario'));
	 		$this->load->view('Entrou/requisicaoEfetuada');
    }
 }
 