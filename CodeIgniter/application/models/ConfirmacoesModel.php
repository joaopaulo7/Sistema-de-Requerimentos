<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ConfirmacoesModel extends CI_Model { 
    public function __construct() {
        parent::__construct();
    }
    
    public function getfuncao(){
	 $res = $this->db->get_where("Pessoa", "cadastro_identificador = ".$this->session->userdata('login'))-> result();
	 return $res[0]->funcao;
    }
    
    public function getListVis($funcao) {
        return $this->db->get_where("FormularioVisita", $funcao."_req =".$this->session->userdata('login'))-> result();
    }
    public function getListSubs(){
        return $this->db->get_where("FormularioSubs", "professor_req =".$this->session->userdata('login'))-> result();
    }
    public function getProf($mat) {
    	  $materia = $this->db->get_where("Materia",' idMateria ='.$mat)-> result();
        return $this->db->get_where("Pessoa",' cadastro_identificador ='.$materia[0]->professor)-> result()[0]->nome;
    }
}