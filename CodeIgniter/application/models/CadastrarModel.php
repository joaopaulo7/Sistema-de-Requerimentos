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
    	  'area'            => $dados['area'],
    	  'funcao'                  => $dados['funcao'],
    	  'email'                   => $dados['email'],
    	  'confirmacao_email'             => false));
    	  
    	  
    	  $this->db->insert("Usuario",array(
    	  'idUsuario' => $dados['idUsuario'],
    	  'login'     => $dados['cadastro_identificador'], 
    	  'senha'     => $dados['senha']));

    }
    public function confirma($usuario) {
		  $cadastro = $this->db->get_where('Usuario', array('idUsuario' => $usuario));
		  $cadastro = $cadastro->result_object()[0];
		  $this->db->where('cadastro_identificador', $cadastro->login);
		  $this->db->update("Pessoa", array('confirmacao_email'=> 1));
	}
	public function setDiretor($usuario) {
		$this->db->insert("Diretor",array( 'iddiretor'=> $usuario));
	}
    public function setCoordenador($usuario, $area) {
		$this->db->insert("Coordenador",array( 'idcoordenador'=> $usuario, 'area'=> $area));
	}
	public function funcValid($func, $area){
		if($func == "Diretor"){
			if($this->db->get('Diretor')->result_object() == null)
				return true;
			else
				return false;
		}
		if($func == "Coordenador"){
				$coords = $this->db->get('Coordenador')->result_object();
				if($coords == null){
					return true;
				}
				else
				{
					foreach( $coords as $coord)
					{
						if($coord->area == $area)
							return false;
					}
				}
		}
		return true;
	}
}
