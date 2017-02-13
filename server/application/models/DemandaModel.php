<?php

class DemandaModel extends MY_Model {
	function __construct() {
		parent::__construct();
		$this->table = 'demanda';
	}

	function buscarTodosNativo() {
		$sql = "SELECT
				d.id_demanda,
				d.titulo,
				DATE_FORMAT(dt_criacao,'%d/%m/%Y') AS dt_criacao,
				CASE WHEN prazo_final IS NULL THEN '-' ELSE DATE_FORMAT(prazo_final,'%d/%m/%Y') END AS prazo_final,
				s.descricao AS situacao,
				p.nome AS solicitante
				FROM demanda d
				JOIN tipo_demanda td ON td.id_tipo_demanda = d.id_tipo_demanda
				JOIN situacao s ON s.id_situacao = d.id_situacao
				JOIN pessoa p ON p.id_pessoa = d.id_solicitante";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
	}	

	function buscarPorIdCompleto($id) {
		$sql = "SELECT 
				p.nome AS solicitante, 
				DATE_FORMAT(d.dt_contato, '%d/%m/%Y') AS dtContato,
				d.titulo AS titulo,
				td.descricao AS tipoDemanda,
				DATE_FORMAT(d.prazo_final, '%d/%m/%Y') AS prazoFinal,
				d.descricao AS descricao,
				d.id_situacao
				FROM demanda d
				JOIN pessoa p ON p.id_pessoa = d.id_solicitante
				JOIN tipo_demanda td ON td.id_tipo_demanda = d.id_tipo_demanda
				WHERE id_demanda = ?";

        $query = $this->db->query($sql, array($id));

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
	}	
}