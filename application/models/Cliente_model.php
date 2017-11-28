<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_model extends CI_model {
	

	public function verCliente($ID=NULL){

		if($ID != NULL):
			$query = $this->db->get_where('cliente', array('ID' => $ID));

			return $query->row();

		endif;

	}

	public function updateCliente($dados=NULL, $ID=NULL){

		if($dados != NULL && $ID != NULL):
			$this->db->update('cliente', $dados, array('ID' => $ID));

		endif;

	}

	public function deleteCliente($ID=NULL){

		if($ID != NULL):
			$this->db->delete('cliente', array('ID' => $ID));

		endif;

	}

	public function verFornecedor($ID=NULL){

		if($ID != NULL):
			$query = $this->db->get_where('fornecedor', array('ID' => $ID));

			return $query->row();

		endif;

	}

	public function deleteFornecedor($ID=NULL){

		if($ID != NULL):
			$this->db->delete('fornecedor', array('ID' => $ID));

		endif;

	}

}


