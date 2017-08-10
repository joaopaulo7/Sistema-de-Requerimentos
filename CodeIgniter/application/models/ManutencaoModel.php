<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ManutencaoModel extends CI_Model { 
    public function __construct() {
        parent::__construct();
    }
    public function getEmail($dado) {
        return $this->db->get_where("Pessoa", "cadastro_identificador =".$dado)-> result()[0]->email;
    }
    
    public function setEmail($dado, $login) {
        $this->db->where("cadastro_identificador",$login);
        $this->db->update('Pessoa', array('email' => $dado));
        $this->db->where("cadastro_identificador",$login);
        $this->db->update('Pessoa', array('confirmacao_email' => 0));  
    }
    
    public function setSenha($dado, $login){
    	  $this->db->where("login",$login);
		  $this->db->update('Usuario', array("senha" => $dado));
    }
    
    public function confirma($login, $senha){
        $this->db->where('login', $login);
        $this->db->where('senha', $senha);
        $resultado = $this->db->get('Usuario'); 
        
        if($this->db->count_all_results() == 1)
			return $resultado->result_array();
    }
}
