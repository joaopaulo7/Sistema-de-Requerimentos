<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper("url");
        $this->load->library("session");
        if(!$this->session->userdata("idUsuario")) {
            redirect("login");
        }
    }
    
    public function index() {
        echo "esse será o menu";
        echo anchor('Entrou/menu/logout', 'Logout', 'title="Logout"');
        echo anchor('Entrou/criarFormularioSubstituicao', 'Requerir Substituicao');
        echo anchor('Entrou/criarFormularioVisita', 'Requerir Visita');
    }
    
    public function logout(){
		redirect('login');
	}
	
}
