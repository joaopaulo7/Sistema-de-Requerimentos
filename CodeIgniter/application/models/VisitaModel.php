<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class VisitaModel extends CI_Model { 
    public function __construct() {
        parent::__construct();
    }
    public function setFormulario($dados) {
        $resultado = $this->db->insert("FormularioVisita",$dados);
    }
    
    public function getLocal(){
    	  return $this->db->get("Local")->result();
    }
}
