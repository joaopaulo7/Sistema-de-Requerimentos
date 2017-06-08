<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CadastrarModel extends CI_Model { 
    public function __construct() {
        parent::__construct();
    }
    public function setCadastro($dados) {
    	  $this->db->insert("Pessoa",array(
    	  'cadastro_identificador' => $dados['cadastro_identificador'],
    	  'nome'                    => $dados['nome'], 
    	  'departamento'            => $dados['departamento'],
    	  'funcao'                  => $dados['funcao'],
    	  'email'                   => $dados['email'],
    	  'confirmacao'             => false));
    	  
    	  
    	  $this->db->insert("Usuario",array(
    	  'idUsuario' => $dados['idUsuario'],
    	  'login'     => $dados['cadastro_identificador'], 
    	  'senha'     => $dados['senha']));

    }
    public function confirma($usuario) {
		  $cadastro = $this->db->get_where('Usuario', array('idUsuario' => $usuario));
		  $cadastro = $cadastro->result_object()[0];
		  $this->db->where('cadastro_identificador', $cadastro->login);
		  $this->db->update("Pessoa", array('confirmacao'=> 1));
	}
}
