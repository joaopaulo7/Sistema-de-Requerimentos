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
        $this->form_validation->set_data($cadastro);
        $this->form_validation->set_rules("nome", "Nome", "required");
        $this->form_validation->set_rules("login", "Login", "required");
        $this->form_validation->set_rules("senha", "Senha", "required");
        if(!$this->form_validation->run()) {
            echo "Preencha todos os campos!!!";
        } else {
            $cadastro["senha"] = sha1($cadastro["senha"]);
            $this->CadastrarModel->setCadastro($cadastro);
            redirect('login');
       }
	}
}
