<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SubstituicaoModel extends CI_Model { 
    public function __construct() {
        parent::__construct();
    }
    public function setFormulario($dados) {
        $resultado = $this->db->insert("FormularioSubs",$dados);
    }
    public function getProfessores(){
    	  return $this->db->get_where("Pessoa"," cadastro_identificador !=".$this->session->userdata('login'))->result();
    }
    
    public function getMateria(){
    	  return $this->db->get_where("Materia", "professor =".$this->session->userdata('login'))->result();
    }
}
