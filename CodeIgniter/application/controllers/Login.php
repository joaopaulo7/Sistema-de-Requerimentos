<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array("form","url","html"));
        $this->load->library("session");
        $this->load->library("form_validation");
        $this->load->model("Loginmodel");
    }
	 
	private $erro = "";
	 
    public function index() {
        $this->session->sess_destroy();
        $this->load->view('login', array( "erro" =>$this->erro));
    }
   
    public function mandarEmail(){
		$email = $this->input->post();
		$this->form_validation->set_rules("email", "Email", "required");
		if($this->form_validation->run()) {
				$dados = $this->Loginmodel->getDados($email['email']);		
		
				if($dados != null)
				{
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
									".anchor('Entrou/manutencao/entrou/'.$dados[0]->login.'/'.$dados[0]->senha, 'Confirmar', 'Confirmar')."
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
					$this->load->view("Redefinição de senha enviada");
			}
			else
			{
					$this->erro = "Esse e mail não está cadastrado.";
					$this->esqueceu();
			}
		}
		else
			$this->esqueceu();
    }  
    
    public function esqueceu(){
    		$this->load->view('esqueceuSenha', array( "erro" =>$this->erro));
    }
    
    public function login() {
        $dados = $this->input->post();
        $this->form_validation->set_data($dados);
        $this->form_validation->set_rules("login", "Login", "required");
        $this->form_validation->set_rules("senha", "Senha", "required");
        if($this->form_validation->run() == FALSE) {
             $this->erro = "Preencha todos os campos";
             $this->index();
        } else {
            $dados["senha"] = sha1($dados["senha"]);
            $resultado = $this->Loginmodel->verificaAcesso($dados);
            if(count($resultado) == 1) {
                $this->session->set_userdata($resultado[0]);
                redirect("Entrou/menu");
            } else {
                $this->erro = "Login/senha incorretos ou e-mail não confirmado";
                $this->index();
            }                
        }
    }
    
    public function logout() {
        redirect("/login");
    }
}
