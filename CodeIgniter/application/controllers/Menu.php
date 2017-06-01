<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper("url");
        $this->load->library("session");
        if(!$this->session->userdata("Login")) {
            redirect("login");
        }
    }
    
    public function index() {
        echo "esse será o menu";
        echo anchor('login', 'Logout', 'title="Logout"');
    }
}
