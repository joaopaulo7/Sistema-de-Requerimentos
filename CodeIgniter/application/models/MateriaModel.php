<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MateriaModel extends CI_Model { 
    public function __construct() {
        parent::__construct();
    }
    public function setMateria($dados) {
        $resultado = $this->db->insert("Materia",$dados);
    }
    public function getArea(){
		return $this->db->get_where("Pessoa", "cadastro_identificador =".$this->session->userdata('login'))-> result_object()[0]->area;
	}
}
