<?php

class DemandaArquivoModel extends MY_Model {
	function __construct() {
		parent::__construct();
		$this->table = 'demanda_arquivo';
	}

	function buscarArquivosPorIdDemanda($id) {
		$sql = "SELECT 
				id_demanda_arquivo,
				nome,
				arquivo
				FROM demanda_arquivo
				WHERE 
				id_demanda = ?";

        $query = $this->db->query($sql, array($id));

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
	}	
}