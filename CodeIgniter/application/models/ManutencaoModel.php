<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ManutencaoModel extends CI_Model { 
    public function __construct() {
        parent::__construct();
    }
    public function getEmail() {
        return $this->db->get_where("Pessoa", "cadastro_identificador =".$this->session->userdata("login"))-> result()[0]->email;
    }
    public function setEmail($dado) {
        $this->db->where("email",$this->session->userdata("login"));
        $this->db->update('Pessoa', array('email' => $dado));
        $this->db->where("cadastro_identificador",$this->session->userdata("login"));
        $this->db->update('Usuario', array('confirmacao_email' => 0));  
    }
    public function verificaAcesso($dados) {
        $this->db->where('login', $this->session->userdata('login'));
        $this->db->where('senha', $dados['senha']);
        return $this->db->get('Usuario')->result(); 
    }
    public function setSenha($dado){
    	  $this->db->where("login",$this->session->userdata("login"));
        $this->db->update('Usuario', array("senha" => $dado));
    }
    public function deletar(){
    	  $this->db->where("login",$this->session->userdata("login"));
        $this->db->delete('Usuario', $dado);
    }
}
