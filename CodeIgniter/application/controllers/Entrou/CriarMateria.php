<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CriarMateria extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array("form","url"));
        $this->load->library("session");
        $this->load->model("MateriaModel");
        $this->load->library("form_validation");
        if(!$this->session->userdata("idUsuario")) {
            redirect("login");
        }
    }

    public function index() {
        $this->load->view('Entrou/criarMateria');
    }

    public function fazerMateria(){
          $cadastro = $this->input->post();


          $cadastro['professor'] = $this->session->userdata("login");

          $cadastro['idMateria'] = rand(0, 10000000);
          $this->form_validation->set_data($cadastro);
         $this->form_validation->set_rules("idMateria", "Id Materia", "is_unique[Materia.idMateria]", array('is_unique' => 'Erro de aleatoriedade  no %s.'));
         while(!$this->form_validation->run()) {
                $cadastro['idMateria'] = rand(0, 1000000);
                $this->form_validation->set_data($cadastro);
                $this->form_validation->set_rules("idMateria", "Id Materia Subs", "is_unique[Materia.idMateria]", array('is_unique' => 'Erro de aleatoriedade  no %s.'));
          }


        $this->form_validation->set_data($cadastro);



        $this->form_validation->set_rules("nome", "Nome", "required", array(
                'required'      => 'Você não escreveu o %s.'));

        $this->form_validation->set_rules("ano", "Ano", "required", array(
                'required'      => 'Você não escreveu o %s.'));


        if( $this->form_validation->run()) {
             $this->MateriaModel->setMateria($cadastro);
             $this->load->view('Entrou/criacaoEfetuada');
        }
        else
             $this->index();
     }
}
