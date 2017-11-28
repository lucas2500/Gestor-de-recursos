<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro_model extends CI_model {


	public function getEstoque(){
		

		$this->db->order_by('ID', 'DESC');
		$query = $this->db->get( 'estoque');
		return $query->result();

	}

	// PEGANDO REGISTRO DAS COMPRAS E VENDAS QUE ESTÃO EM ABERTO E QUITADAS

	public function getVendas(){
		

		$this->db->order_by('ID', 'DESC');
		$query = $this->db->get('expedicao');
		return $query->result();

	}

	public function getVendasRelatorio(){
		

		$this->db->order_by('ID', 'DESC');
		$query = $this->db->get('registroVendas');
		return $query->result();

	}


	public function getDuplicata(){
		

		$this->db->order_by('ID', 'DESC');
		$query = $this->db->get( 'duplicata');
		return $query->result();

	}

	public function getComprasRelatorio(){
		

		$this->db->order_by('ID', 'DESC');
		$query = $this->db->get('registroCompras');
		return $query->result();

	}

	// FIM

	public function addProdutos($dados=null){

		if ($dados != NULL):

			$this->db->insert('estoque', $dados);

		endif;
		
	}

	public function addExpedicao($dados=null){

		if ($dados != NULL):

			$this->db->insert('expedicao', $dados);

		endif;
		
	}

	public function addDuplicata($dados=null){

		if ($dados != NULL):

			$this->db->insert('duplicata', $dados);

		endif;
		
	}


	// DELETANDO REGISTRO DO RELATÓRIO DE COMPRAS QUITADAS

	public function getComprasRegistroByID($ID=NULL){

		if ($ID != NULL):
			$this->db->where('ID', $ID);
			$this->db->limit(1);
			$query = $this->db->get('registroCompras');
			return $query->row();

		endif;	

	}

	public function deleteCompra($ID=NULL){

		if($ID != NULL):

			$this->db->delete('registroCompras', array('ID'=>$ID));
		endif;


	}

	// FIM

	// DELETANDO REGISTRO DO RELATÓRIO DE VENDAS QUITADAS

	public function getVendasRegistroByID($ID=NULL){

		if ($ID != NULL):
			$this->db->where('ID', $ID);
			$this->db->limit(1);
			$query = $this->db->get('registroVendas');
			return $query->row();

		endif;	

	}

	public function deleteVenda($ID=NULL){

		if($ID != NULL):

			$this->db->delete('registroVendas', array('ID'=>$ID));
		endif;


	}

	// FIM

	// QUITANDO COMPRAS E VENDAS

	public function getVendasByID($ID=NULL){

		if ($ID != NULL):
			$this->db->where('ID', $ID);
			$this->db->limit(1);
			$query = $this->db->get('expedicao');
			return $query->row();

		endif;	

	}

	public function quitVenda($ID=NULL){

		if($ID != NULL):

			$this->db->delete('expedicao', array('ID'=>$ID));
		endif;


	}

	public function getComprasByID($ID=NULL){

		if ($ID != NULL):
			$this->db->where('ID', $ID);
			$this->db->limit(1);
			$query = $this->db->get('duplicata');
			return $query->row();

		endif;	

	}

	public function quitCompra($ID=NULL){

		if($ID != NULL):

			$this->db->delete('duplicata', array('ID'=>$ID));
		endif;


	}

	public function insertVenda($dados=NULL){

		if ($dados != NULL):

			$this->db->insert('registroVendas', $dados);

		endif;	

	}

	public function insertCompra($dados=NULL){

		if ($dados != NULL):

			$this->db->insert('registroCompras', $dados);

		endif;	

	}


	// FIM

	public function getProdutosByID($ID=NULL){

		if ($ID != NULL):
			$this->db->where('ID', $ID);
			$this->db->limit(1);
			$query = $this->db->get('estoque');
			return $query->row();

		endif;	

	}

	public function editarEstoque($dados=NULL, $ID=NULL){


		if ($dados != NULL && $ID != NULL):

			$this->db->update('estoque', $dados, array('ID'=>$ID));

		endif;
	}

	public function deleteProd($ID=NULL){

		if($ID != NULL):

			$this->db->delete('estoque', array('ID'=>$ID));
		endif;


	}

	public function addFornada($dados=NULL){

		if($dados != NULL):

			$this->db->insert('fornada', $dados);

		endif;

	}

	public function getFornada(){
		

		$this->db->order_by('ID', 'DESC');
		$query = $this->db->get( 'fornada');
		return $query->result();

	}

	public function getFornadaByID($ID=NULL){

		if ($ID != NULL):
			$this->db->where('ID', $ID);
			$this->db->limit(1);
			$query = $this->db->get('fornada');
			return $query->row();

		endif;	

	}

	public function deleteFornada($ID=NULL){

		if($ID != NULL):

			$this->db->delete('fornada', array('ID'=>$ID));
		endif;


	}

	public function cadFichaProducao($dados=NULL){


		if($dados != NULL):
			$this->db->insert('fichaTecnica', $dados);

		endif;

	}

	public function getFichaProducao(){

		$this->db->order_by('ID', 'DESC');
		$query = $this->db->get( 'fichaTecnica');
		return $query->result();

	}

	public function deleteFichaProducao($ID=NULL){

		if($ID != NULL):

			$this->db->delete('fichaTecnica', array('ID'=>$ID));
		endif;


	}

	public function getFichaByID($ID=NULL){

		if ($ID != NULL):
			$this->db->where('ID', $ID);
			$this->db->limit(1);
			$query = $this->db->get('fichaTecnica');
			return $query->row();

		endif;	

	}

	public function entradaEstoque($dados=NULL){

		if($dados != NULL):
			$this->db->insert('entradaEstoque', $dados);

		endif;
	}


	public function saidaEstoque($dados=NULL){

		if($dados != NULL):
			$this->db->insert('saidaEstoque', $dados);

		endif;


	}

}


