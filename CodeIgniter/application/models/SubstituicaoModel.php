<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SubstituicaoModel extends CI_Model { 
    public function __construct() {
        parent::__construct();
    }
    public function setCadastro($dados) {
        $resultado = $this->db->insert("FormularioSubstituicao",$dados);
    }
}