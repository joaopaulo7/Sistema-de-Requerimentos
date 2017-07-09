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
                $this->erro = "Login ou senha incorretos";
                redirect('login');
            }                
        }
    }
    
    public function logout() {
        redirect("/login");
    }
}
