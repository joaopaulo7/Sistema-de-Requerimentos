<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CriarLocal extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array("form","url"));
        $this->load->library("session");
        $this->load->model("LocalModel");
        $this->load->library("form_validation");
        if(!$this->session->userdata("idUsuario")) {
            redirect("login");
        }
    }

    public function index() {
        $this->load->view('Entrou/criarLocal');
    }

    public function fazerLocal(){
          $cadastro = $this->input->post();


          $cadastro['idLocal'] = rand(0, 10000000);
          $this->form_validation->set_data($cadastro);
         $this->form_validation->set_rules("idLocal", "Id Local", "is_unique[Local.idLocal]", array('is_unique' => 'Erro de aleatoriedade  no %s.'));
         while(!$this->form_validation->run()) {
               $cadastro['idLocal'] = rand(0, 1000000);
                $this->form_validation->set_data($cadastro);
                $this->form_validation->set_rules("idLocal", "Id Local", "is_unique[Local.idLocal]", array('is_unique' => 'Erro de aleatoriedade  no %s.'));
          }


        $this->form_validation->set_data($cadastro);



        $this->form_validation->set_rules("nome", "Nome", "required", array(
                'required'      => 'Você não escreveu o %s.'));


        $this->form_validation->set_rules("rua", "Rua", "required", array(
                'required'      => 'Você não escreveu o %s.'));


        $this->form_validation->set_rules("numero", "Número", "required", array(
                'required'      => 'Você não escreveu o %s.'));


        $this->form_validation->set_rules("bairro", "Bairro", "required", array(
                'required'      => 'Você não escreveu o %s.'));


        $this->form_validation->set_rules("cidade", "Cidade", "required", array(
                'required'      => 'Você não escreveu o %s.'));


        if( $this->form_validation->run()) {
             $this->LocalModel->setLocal($cadastro);
            $this->load->view('Entrou/criacaoEfetuada');
        }
        else
             $this->index();
     }
}
