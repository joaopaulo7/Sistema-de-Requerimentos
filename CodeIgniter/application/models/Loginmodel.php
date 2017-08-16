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
        
        $this->db->where('cadastro_identificador', $dados['login']);
        $this->db->where('confirmacao_email', 1);
        $this->db->from('Pessoa');
        if($this->db->count_all_results() == 1)
			return $resultado->result_array();
    }
    public function getDados($email){
		$this->db->where('email', $email);
		$resultado = $this->db->get('Pessoa')->result();
		if($resultado != null){
			$this->db->where('login', $resultado[0]->cadastro_identificador);
			return $this->db->get('Usuario')->result();
		}
		else
			return null;
	}
}
