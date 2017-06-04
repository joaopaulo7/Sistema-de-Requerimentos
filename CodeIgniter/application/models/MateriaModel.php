<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MateriaModel extends CI_Model { 
    public function __construct() {
        parent::__construct();
    }
    public function setMateria($dados) {
        $resultado = $this->db->insert("Materia",$dados);
    }
}
