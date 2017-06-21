<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorModel extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function getProfessor($id){
    	$this->db->where('cadastro_identificador', $id);
    	$pessoa = $this->db->get('Pessoa');
    	$pessoa = $pessoa->result_object()[0];
    	return $pessoa;
    }
    
    public function getCoorSubs($idform){
    	$this->db->where('idFormularioSubs', $idform);
    	$formulario = $this->db->get('FormularioSubs');
    	$formulario = $formulario->result_object()[0];
    	$this->db->where('idMateria', $formulario->materia);
    	$materia = $this->db->get('Materia');
    	$materia = $materia->result_object()[0];
    	$this->db->where('departamento', $materia->curso);
    	$this->db->where('funcao', 'Coordenador');
    	return $this->db->get('Pessoa')->result_object()[0];
    }
    
    public function getCoorVis($idform){
    	$this->db->where('idFormulario', $idform);
    	$formulario = $this->db->get('FormularioVisita');
    	$formulario = $formulario->result_object()[0];
    	$this->db->where('cadastro_identificador', $formulario->proponente_da_viagem);
    	$propoente = $this->db->get('Pessoa');
    	$propoente = $propoente->result_object()[0];
    	$this->db->where('departamento', $propoente->departamento);
    	$this->db->where('funcao', 'Coordenador');
    	return $this->db->get('Pessoa')->result_object()[0];
    }
    
    public function getDirVis($idform){
    	$this->db->where('idFormulario', $idform);
    	$formulario = $this->db->get('FormularioVisita');
    	$formulario = $formulario->result_object()[0];
    	$this->db->where('cadastro_identificador', $formulario->proponente_da_viagem);
    	$propoente = $this->db->get('Pessoa');
    	$propoente = $propoente->result_object()[0];
    	$this->db->where('departamento', $propoente->departamento);
    	$this->db->where('funcao', 'Diretor');
    	return $this->db->get('Pessoa')->result_object()[0];
    }
    
    public function setProfessor($idform, $id){
    	$this->db->where('idFormularioSubs', $idform);
    	return $this->db->update('FormularioSubs', array('professor_substituto'=>$id));
    }
    
    public function setCoorSubs($idform, $id){
    	$this->db->where('idFormularioSubs', $idform);
    	return $this->db->update('FormularioSubs', array('coordenador'=>$id));
    }
    
    public function setCoorVis($idform, $id){
    	$this->db->where('idFormulario', $idform);
    	return $this->db->update('FormularioVisita', array('conf_coordenador'=>$id));
    }
    
    public function setDirVis($idform, $id){
    	$this->db->where('idFormulario', $idform);
    	return $this->db->update('FormularioVisita', array('conf_diretor'=>$id));
    }
}