<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorRequisitos extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array("form","url","html"));
        $this->load->library("session");
        $this->load->model("ControladorModel");
        if(!$this->session->userdata("idUsuario")) {
            redirect("login");
        }
    }
    
    private function mandarEmail($email){
		
		$html = " <!DOCTYPE html>
				<html>
					<head>
						<title>Login Sis.Req</title>
						<meta charset='UTF-8'>
						<meta name='viewport' content='width=device-width, initial-scale=1.0'>
					</head>
					<body>
						<h1>Existem formulários a serem confirmados, <br>para confirmar, entre no site </h1><br>
						<a href='#'>Ir ao site<a>
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
        
    
	 public function criadoSubs($idform, $id){
	 		$confuser = $this->ControladorModel->setProfessorReq($id, $idform);
			$this->mandarEmail($confuser->email);
		   $this->load->view('Entrou/requisicaoEfetuada');
    }
    
    public function criadoVis($idform){
	 		$confuser = $this->ControladorModel->setCoorReqVis($this->session->userdata('login'), $idform);
			$this->mandarEmail($confuser->email);
		   $this->load->view('Entrou/requisicaoEfetuada');
    }
    
    
    public function confirmarProf($idform){
			$this->load->view('Entrou/confirmaFormSubs');
			if($this->input->post() != null){
				$this->ControladorModel->setProfessor($idform, $this->session->userdata('login'));
				$confuser = $this->ControladorModel->setCoorReqSubs($this->session->userdata('login'), $idform);
				$this->mandarEmail($confuser->email);
				$this->load->view('Entrou/confirmacaoEfetuada');
			}
    }
    
    
    public function confirmarCoorSubs($idform){
			$this->load->view('Entrou/confirmaFormSubs');
			if($this->input->post() != null){
				$this->ControladorModel->setCoorSubs($idform, $this->session->userdata('login'));
				$this->load->view('Entrou/confirmacaoEfetuada');
			}
	 		  
    }
    
    
    public function confirmarCoorVis($idform){
			$this->load->view('Entrou/confirmaFormSubs');
			if($this->input->post() != null){
				$this->ControladorModel->setCoorVis($idform, $this->session->userdata('login'));
				$confuser = $this->ControladorModel->setDirReq($idform);
				$this->mandarEmail($confuser->email);
				$this->load->view('Entrou/confirmacaoEfetuada');
			}
    }
    
  
    public function confirmarDirVis($idform){
			$this->load->view('Entrou/confirmaFormSubs');
			if($this->input->post() != null){
				$this->ControladorModel->setDirVis($idform, $this->session->userdata('login'));
				$this->load->view('Entrou/confirmacaoEfetuada');
			}
	}
}
