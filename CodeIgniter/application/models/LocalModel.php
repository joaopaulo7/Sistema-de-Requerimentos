<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LocalModel extends CI_Model { 
    public function __construct() {
        parent::__construct();
    }
    public function setLocal($dados) {
        $resultado = $this->db->insert("Local",$dados);
    }
}