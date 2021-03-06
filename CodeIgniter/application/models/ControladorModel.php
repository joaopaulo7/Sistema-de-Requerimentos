<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorModel extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function getProfessor($id){
    	$this->db->where('cadastro_identificador', $id);
    	return $this->db->get('Pessoa')->result_object()[0];
    }
    
    public function setProfessorReq($id, $idform){
    	$this->db->where('idFormularioSubs', $idform);
    	$this->db->update('FormularioSubs', array('professor_req'=>$id));
    	return $this->db->get_where('Pessoa',"cadastro_identificador = ".$id)->result_object()[0];
    }
    
    public function setCoorReqSubs($id, $idform){
    	
    	$this->db->where('cadastro_identificador', $id);
    	$pessoa = $this->db->get('Pessoa')->result_object()[0];
    	
    	$this->db->where('area', $pessoa->area);
    	$coor = $this->db->get('Coordenador')->result_object()[0];
    	
    	$this->db->where('idFormularioSubs', $idform);
    	$this->db->update('FormularioSubs', array('coordenador_req'=>$coor->idCoordenador));
    	return $this->getProfessor($coor->idCoordenador);
    }
    
    public function setCoorReqVis($id, $idform){
    	$this->db->where('cadastro_identificador', $id);
    	
    	$pessoa = $this->db->get('Pessoa')->result_object()[0];
    	
    	$this->db->where('area', $pessoa->area);
    	$coor = $this->db->get('Coordenador')->result_object()[0];
    	
    	$this->db->where('idFormulario', $idform);
    	$this->db->update('FormularioVisita', array('coordenador_req'=>$coor->idCoordenador));
    	return $this->getProfessor($coor->idCoordenador);
    }
    
    public function setDirReq($idform){
    	
    	$dir = $this->db->get('Diretor')->result_object()[0];
    	
    	$this->db->where('idFormulario', $idform);
    	$this->db->update('FormularioVisita', array('diretor_req'=>$dir->iddiretor));
    	return $this->db->get_where('Pessoa','cadastro_identificador ='.$dir->iddiretor)->result()[0];
    	}
    
    
    public function setProfessor($idform, $id){
    	$this->db->where('idFormularioSubs', $idform);
    	$this->db->update('FormularioSubs', array('professor_substituto'=>$id,'professor_req'=>null));
    }
    
    public function setCoorSubs($idform, $id){
    	$this->db->where('idFormularioSubs', $idform);
    	$this->db->update('FormularioSubs', array('coordenador'=>$id));
    	return $this->db->update('FormularioSubs', array('coordenador_req'=>null));
    }
    
    public function setCoorVis($idform, $id){
    	$this->db->where('idFormulario', $idform);
    	$this->db->update('FormularioVisita', array('coordenador'=>$id));
    	return $this->db->update('FormularioVisita', array('coordenador_req'=>null));
    }
    
    public function setDirVis($idform, $id){
    	$this->db->where('idFormulario', $idform);
    	$this->db->update('FormularioVisita', array('diretor'=>$id));
    	return $this->db->update('FormularioVisita', array('diretor_req'=>null));
    }
}
