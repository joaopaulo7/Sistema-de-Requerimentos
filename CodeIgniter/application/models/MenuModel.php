<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MenuModel extends CI_Model { 
    public function __construct() {
        parent::__construct();
    }
    public function getAlt(){
	 	$res = $this->db->get_where("Pessoa", "cadastro_identificador = ".$this->session->userdata('login'))-> result()[0]->funcao;
	 	if(count($this->db->get("Coordenador")->result()) == 3 && $res == "Diretor")
	 		return true;
    }
}
