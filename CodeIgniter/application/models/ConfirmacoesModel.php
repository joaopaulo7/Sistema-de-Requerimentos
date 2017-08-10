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
    
    public function getFormVis($id) {
        return $this->db->get_where("FormularioVisita", "idFormulario =".$id)-> result()[0];
    }
    
	 public function getFormSubs($id) {
        return $this->db->get_where("FormularioSubs", "idFormularioSubs =".$id)-> result()[0];
    }    
    
    public function getListSubs(){
        return $this->db->get_where("FormularioSubs", "Professor_req =".$this->session->userdata('login')." or coordenador_req = ". $this->session->userdata('login'))-> result();
    }
    
    public function getPessoa($id) {
    	  if($id == null)
	 	  	  return "não confirmado";
        return $this->db->get_where("Pessoa",' cadastro_identificador ='.$id)-> result()[0]->nome;
    }
    
    public function getProf($mat) {
    	  $materia = $this->db->get_where("Materia",' idMateria ='.$mat)-> result();
        return $this->getPessoa($materia[0]->professor);
    }
    
	 public function getMateria($mat) {
    	  return $materia = $this->db->get_where("Materia",' idMateria ='.$mat)-> result()[0]->nome;
    }    
    
    public function isProf($idform){
        if($this->db->get_where("FormularioSubs", "idFormularioSubs = ".$idform)->result()[0]->professor_req == $this->session->userdata('login'))
        	 return true;
    }
}
