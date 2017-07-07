<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ListagemModel extends CI_Model { 
    public function __construct() {
        parent::__construct();
    }
    public function getListVis() {
        return $this->db->get("FormularioVisita")-> result();
    }
    public function getListSubs() {
        return $this->db->get("FormularioSubs")-> result();
    }
    public function getMateria($mat) {
        $res = $this->db->get_where("Materia",' idMateria ='.$mat)-> result();
        return $res[0]->nome;
    }
    public function getProf($prof) {
        $res = $this->db->get_where("Pessoa",' cadastro_identificador ='.$prof)-> result();
        if($res == null)
        		return "Não confirmado ainda";
        return $res[0]->nome;
    }
    public function getProf0($mat) {
        $res = $this->db->get_where("Materia",' idMateria ='.$mat)-> result();
        return $this->getProf($res[0]->professor);
    }
}