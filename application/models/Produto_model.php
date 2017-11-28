<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto_model extends CI_model {

	public function addFrances($dados=NULL){

		if($dados != NULL):
			$this->db->insert('saidaFrances', $dados);

		endif;
	}

	public function addDoceComprido($dados=NULL){

		if($dados != NULL):
			$this->db->insert('saidaDoceComprido', $dados);

		endif;
	}

	public function addDoceCortado($dados=NULL){

		if($dados != NULL):
			$this->db->insert('saidaDoceCortado', $dados);

		endif;
	}

	public function addDoceEnrolado($dados=NULL){

		if($dados != NULL):
			$this->db->insert('saidaDoceEnrolado', $dados);

		endif;
	}

	public function addBrote($dados=NULL){

		if($dados != NULL):
			$this->db->insert('saidaBrote', $dados);

		endif;
	}

	public function addCarteira($dados=NULL){

		if($dados != NULL):
			$this->db->insert('saidaCarteira', $dados);

		endif;
	}

	public function addSeda($dados=NULL){

		if($dados != NULL):
			$this->db->insert('saidaSeda', $dados);

		endif;
	}

	public function addCrioulo($dados=NULL){

		if($dados != NULL):
			$this->db->insert('saidaCrioulo', $dados);

		endif;
	}

	public function addBolinha($dados=NULL){

		if($dados != NULL):
			$this->db->insert('saidaBolinha', $dados);

		endif;
	}

	public function editarFornada($dados=NULL, $ID=NULL){

		if($dados != NULL && $ID != NULL):
			$this->db->update('fornada', $dados, array('ID' =>$ID));

		endif;

	}

	public function cadUser($dados=NULL){

		if($dados != NULL):
			$this->db->insert('usuarios', $dados);

		endif;

	}

	public function getUser(){

		$this->db->order_by('nome', 'ASC');
		$query = $this->db->get('usuarios');

		return $query->result();	

	}

	public function getUserByID($ID=NULL){

		if ($ID != NULL):
			$this->db->where('ID', $ID);
			$this->db->limit(1);
			$query = $this->db->get('usuarios');
			return $query->row();

		endif;	

	}

	public function deleteUser($ID=NULL){

		if($ID != NULL):
			$this->db->delete('usuarios', array('ID' => $ID));

		endif;

	}

	public function logar($email, $senha){


		$this->db->where('email', $email);  
		$this->db->where('senha', sha1($senha));

		$query = $this->db->get('usuarios');

		if($query->num_rows() > 0){

			return true;


		} else {

			return false;

		}


	}

	public function showUser($email=null){


		if($email != null):

			$query = $this->db->get_where('usuarios', array('email' => $email));

			return $query->row();

		endif;

	}

	public function alterarSenha($email=NULL, $senha=NULL){

		if($email != NULL && $senha != NULL):
			$this->db->update('usuarios', $senha, array('email' => $email));

		endif;

	}


	public function addCliente($dados=NULL){

		if($dados != NULL):
			$this->db->insert('cliente', $dados);

		endif;

	}

	public function addForn($dados=NULL){

		if($dados != NULL):
			$this->db->insert('fornecedor', $dados);

		endif;

	}

	public function getCliente(){

		$this->db->order_by('nome', 'ASC');
		$query = $this->db->get('cliente');

		return $query->result();

	}

	public function getForn(){

		$this->db->order_by('nome', 'ASC');
		$query = $this->db->get('fornecedor');

		return $query->result();

	}

	public function getProduto(){

		$this->db->order_by('nomeProd', 'ASC');
		$query = $this->db->get('estoque');

		return $query->result();

	}

}


