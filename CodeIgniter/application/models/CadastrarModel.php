<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CadastrarModel extends CI_Model { 
    public function __construct() {
        parent::__construct();
    }
    public function setCadastro($dadosp, $dadosf) {
    	  $this->db->insert("Pessoa",$dadosp);
    	  $dadosf['login'] = $dadosp['cadastro_identificador'];
    	  $this->db->insert("Usuario",array(
    	  'idUsuario' => $dadosf['idUsuario'],
    	  'login'     => $dadosf['login'], 
    	  'senha'     => $dadosf['senha']));

    }
}
