<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AlterarModel extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
   public function alterar($dados) {
        if($this->db->get("Diretor")->result_object()[0]->iddiretor != $dados['diretor']){
            $this->db->where("funcao", "Diretor");
           $this->db->update('Pessoa', array('funcao' => "Professor"));

            $pessoa = $this->db->get_where("Pessoa", "cadastro_identificador =".$dados['diretor'])->result_object()[0];
            $this->db->where("cadastro_identificador", $dados['diretor']);
            $this->db->update('Pessoa', array('funcao' => "Diretor"));
            $this->db->update('Diretor', array('iddiretor' => $dados['diretor']));
        }
        $this->db->where("area", "Informática");
        if($this->db->get("Coordenador")->result_object()[0]->idCoordenador != $dados['coordInfo']){
            $this->db->where("funcao", "Coordenador");
            $this->db->where("area", "Informática");
           $this->db->update('Pessoa', array('funcao' => "Professor"));

            $pessoa = $this->db->get_where("Pessoa", "cadastro_identificador =".$dados['coordInfo'])->result_object()[0];
            $this->db->where("cadastro_identificador", $dados['coordInfo']);
            $this->db->update('Pessoa', array('funcao' => "Coordenador"));

            $this->db->where("area", "Informática");
            $this->db->update('Coordenador', array('idCoordenador' => $dados['coordInfo']));
        }

        $this->db->where("area", "Edificações");
        if($this->db->get("Coordenador")->result_object()[0]->idCoordenador != $dados['coordEdif']){
            $this->db->where("funcao", "Coordenador");
            $this->db->where("area", "Edificações");
           $this->db->update('Pessoa', array('funcao' => "Professor"));

            $pessoa = $this->db->get_where("Pessoa", "cadastro_identificador =".$dados['coordEdif'])->result_object()[0];
            $this->db->where("cadastro_identificador", $dados['coordEdif']);
            $this->db->update('Pessoa', array('funcao' => "Coordenador"));

            $this->db->where("area", "Edificações");
            $this->db->update('Coordenador', array('idCoordenador' => $dados['coordEdif']));
        }

        $this->db->where("area", "Mecatrônica");
        if($this->db->get("Coordenador")->result_object()[0]->idCoordenador != $dados['coordMeca']){
            $this->db->where("funcao", "Coordenador");
            $this->db->where("area", "Mecatrônica");
            $this->db->update('Pessoa', array('funcao' => "Professor"));

            $pessoa = $this->db->get_where("Pessoa", "cadastro_identificador =".$dados['coordMeca'])->result_object()[0];
            $this->db->where("cadastro_identificador", $dados['coordMeca']);
            $this->db->update('Pessoa', array('funcao' => "Coordenador"));

            $this->db->where("area", "Mecatrônica");
            $this->db->update('Coordenador', array('idCoordenador' => $dados['coordMeca']));
        }

   }

   public function existe($dados) {
            if( !isset($dados['diretor']))
                return false;
            if( !isset($dados['coordInfo']))
                return false;
            if( !isset($dados['coordEdif']))
                return false;
            if( !isset($dados['coordMeca']))
                return false;
            return true;
    }

    public function getDiretor(){
        $r = $this->db->get("Diretor")->result_object()[0];
        return $this->db->get_where("Pessoa", "cadastro_identificador =".$r->iddiretor)->result_object()[0];
    }

    public function getCoordenadorInfo(){
        $r = $this->db->get_where("Coordenador", "area = 'Informática'")->result_object();
        if( $r!= null)
            return $this->db->get_where("Pessoa", "cadastro_identificador =".$r[0]->idCoordenador)->result_object()[0];
    }

    public function getCoordenadorEdif(){
        $r = $this->db->get_where("Coordenador", "area = 'Edificações'")->result_object();
        if( $r!= null)
            return $this->db->get_where("Pessoa", "cadastro_identificador =".$r[0]->idCoordenador)->result_object()[0];
    }

    public function getCoordenadorMeca(){
        $r = $this->db->get_where("Coordenador", "area = 'Mecatrônica'")->result_object();
        if( $r!= null)
            return $this->db->get_where("Pessoa", "cadastro_identificador =".$r[0]->idCoordenador)->result_object()[0];
    }

    public function getPessoas(){
        $r = $this->db->get_where("Pessoa", "funcao = 'Professor'")->result_object();
        if( $r!= null)
            return $r;
    }

    public function getPessoasI(){
        $r = $this->db->get_where("Pessoa", "funcao = 'Professor' and area = 'Informática'")->result_object();
        if( $r!= null)
            return $r;
    }

    public function getPessoasE(){
        $r = $this->db->get_where("Pessoa", "funcao = 'Professor' and area = 'Edificações'")->result_object();
        if( $r!= null)
            return $r;
    }

    public function getPessoasM(){
        $r = $this->db->get_where("Pessoa", "funcao = 'Professor' and area = 'Mecatrônica'")->result_object();
        if( $r!= null)
            return $r;
    }
}
