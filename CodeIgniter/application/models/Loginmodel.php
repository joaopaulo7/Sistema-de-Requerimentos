<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Loginmodel extends CI_Model { 
    public function __construct() {
        parent::__construct();
    }
    public function verificaAcesso($dados) {
        $this->db->where('login', $dados['login']);
        $this->db->where('senha', $dados['senha']);
        $resultado = $this->db->get('Usuario'); 
        return $resultado->result_array();
    }
}
