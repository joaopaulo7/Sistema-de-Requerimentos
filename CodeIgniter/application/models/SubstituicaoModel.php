<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SubstituicaoModel extends CI_Model { 
    public function __construct() {
        parent::__construct();
    }
    public function setFormulario($dados) {
        $resultado = $this->db->insert("FormularioSubs",$dados);
    }
}
