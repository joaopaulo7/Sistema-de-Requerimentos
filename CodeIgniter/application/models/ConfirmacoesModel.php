<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ConfirmacoesModel extends CI_Model { 
    public function __construct() {
        parent::__construct();
    }
    
    public function getfuncao(){
	 $res = $this->db->get_where("Pessoa", "cadastro_identificador = ".$this->session->userdata('login'))-> result();
	 return $res[0]->funcao;
    }
    
    public function getListVis($funcao) {
		$this->db->order_by("data_preenchimento", "asc");
		$this->db->where( $funcao."_req =".$this->session->userdata('login'));
        $forms = $this->db->get("FormularioVisita")-> result();
        foreach($forms as $form)
        {
			$form->proponente_da_viagem = $this->getPessoa($form->proponente_da_viagem);
			$form->coordenador = $this->getPessoa($form->coordenador);
			$form->diretor = $this->getPessoa($form->diretor);
			$form->local = $this->getLocal($form->local);
			$form->data_preenchimento = $this->ajustaData($form->data_preenchimento);
        }
        return $forms;
    }
    
    public function getFormVis($id) {
        return $this->db->get_where("FormularioVisita", "idFormulario =".$id)-> result()[0];
    }
    
	 public function getFormSubs($id) {
        return $this->db->get_where("FormularioSubs", "idFormularioSubs =".$id)-> result()[0];
    }    
    
    public function getListSubs(){
        $this->db->order_by("data_da_substituicao", "asc");
        $this->db->where("Professor_req =".$this->session->userdata('login'));
		$this->db->or_where("coordenador_req =".$this->session->userdata('login'));
        $forms = $this->db->get("FormularioSubs")-> result();
        foreach($forms as $form)
        {
			$form->professor_substituto = $this->getPessoa($form->professor_substituto);
			$form->coordenador = $this->getPessoa($form->coordenador);
			$form->materia = $this->getProf($form->materia);
        }
        return $forms;
    }
    
    public function getPessoa($id) {
    	  if($id == null)
	 	  	  return "não confirmado";
        return $this->db->get_where("Pessoa",' cadastro_identificador ='.$id)-> result()[0]->nome;
    }
    
    public function getProf($mat) {
    	  $materia = $this->db->get_where("Materia",' idMateria ='.$mat)-> result();
        return $this->getPessoa($materia[0]->professor);
    }   
    
    public function isProf($idform){
        if($this->db->get_where("FormularioSubs", "idFormularioSubs = ".$idform)->result()[0]->professor_req == $this->session->userdata('login'))
        	 return true;
    }
    public function getLocal($id){
        return $this->db->get_where("Local", "idLocal = ".$id)->result()[0]->nome;
    }
    
    public function ajustaData( $data){
		$ndata = "000/00/00";
		$i = 0;
		while($i < 10)
		{
			if($i < 4)
				$ndata[$i+6] = $data[$i];
			else if($i == 5 || $i == 7)
				$ndata[$i] = '/';
			else if($i >5 && $i<7)
				$ndata[$i-2] = $data[$i];
			else if($i > 7)
				$ndata[$i-8] = $data[$i];
			$i++;
		}
		return $ndata;
	}
}
