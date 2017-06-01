<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array("form","url"));
        $this->load->library("session");
        $this->load->library("form_validation");
        $this->load->model("Loginmodel");
    }

    public function index() {
        $this->load->view('login');
    }
    
    public function login() {
        $dados = $this->input->post();
        $this->form_validation->set_data($dados);
        $this->form_validation->set_rules("login", "Login", "required");
        $this->form_validation->set_rules("senha", "Senha", "required");
        if($this->form_validation->run() == FALSE) {
            echo "Preencha todos os campos!!!";
        } else {
            $dados["senha"] = sha1($dados["senha"]);
            $resultado = $this->Loginmodel->verificaacesso($dados);
            if(count($resultado) == 1) {
                $this->session->set_userdata($resultado[0]);
                echo "Login efetuado com sucesso!!!";
                redirect("/menu");
            } else {
                echo "Login ou senha incorretos!!!";
            }                
        }
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect("/login");
    }
}
