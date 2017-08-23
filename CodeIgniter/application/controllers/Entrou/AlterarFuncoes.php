<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AlterarFuncoes extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array("form","url"));
        $this->load->library("session");
        $this->load->model("AlterarModel");
        $this->load->library("form_validation");
        if(!$this->session->userdata("idUsuario")) {
            redirect("login");
        }
    }
    
    public $erro = "";
    
    public function index() {
    	$dados['erro'] = $this->erro;
    	$dados['diretor'] = $this->AlterarModel->getDiretor();
    	$dados['coordInf'] = $this->AlterarModel->getCoordenadorInfo();
    	$dados['coordEdifi'] = $this->AlterarModel->getCoordenadorEdif();
		$dados['coordMecat'] = $this->AlterarModel->getCoordenadorMeca();
		$dados['pessoasInfo'] = $this->AlterarModel->getPessoasI();
		$dados['pessoasEdif'] = $this->AlterarModel->getPessoasE();
		$dados['pessoasMeca'] = $this->AlterarModel->getPessoasM();
		$dados['pessoas'] = $this->AlterarModel->getPessoas();
		$this->load->view('Entrou/alterar', $dados);
    }
    
    public function alterar(){
    	  	$dados = $this->input->post();
		 	if($this->AlterarModel->existe($dados))
		  		$this->AlterarModel->alterar($dados);
		  	else{
		  		$this->erro = "Nenhuma função pode estar vazia.";
		  		$this->index();
		  	}
		  	$this->load->view('Entrou/alteracaoCompleta');
	 }
}
