<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CriarFormularioSubstituicao extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array("form","url"));
        $this->load->library("session");
        $this->load->library("form_validation");
        $this->load->model("SubstituicaoModel");
        $this->load->library("session");
        if(!$this->session->userdata("Login")) {
            redirect("login");
        }
    }
    
    public function index() {
        echo "esse será o form Substituição";
     }
  }