<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

	function __construct() {         
		parent::__construct(); 

		$this->load->model('Cadastro_model', 'Pandel');
		$this->load->model('Produto_model', 'Pandel2');
		$this->load->model('Cliente_model', 'Pandel3');
		$this->load->library('session');
		// $this->load->helper('date');

	}

	public function cadCliente(){

		$data['nome'] = $this->input->post('nome');
		$data['cnpj'] = $this->input->post('cnpj');
		$data['telefone'] = $this->input->post('telefone');
		$data['rua'] = $this->input->post('rua');
		$data['numero'] = $this->input->post('numero');
		$data['cidade'] = $this->input->post('cidade');
		$data['bairro'] = $this->input->post('bairro');
		$data['cep'] = $this->input->post('cep');

		if($this->input->post('ID') != NULL){

			$this->Pandel3->updateCliente($data, $this->input->post('ID'));
			redirect("cliente/Cliente");

		} else{

			$this->Pandel2->addCliente($data);
			redirect("cadastro/menuPrincipal");
		}

	}

	public function cadForn(){

		$data['nome'] = $this->input->post('nome');
		$data['cnpj'] = $this->input->post('cnpj');
		$data['telefone'] = $this->input->post('telefone');

		$this->Pandel2->addForn($data);
		redirect("cadastro/Financeiro");


	}

	public function entradaEstoque(){

		$data['codProd'] = $this->input->post('codProd');
		$data['peso'] = $this->input->post('peso');
		$data['totalKg'] = $this->input->post('totalKg');

		$this->Pandel->entradaEstoque($data);

		redirect("cadastro/Financeiro");

		// var_dump($data);

	}

	public function Cliente(){

		if($this->session->userdata('email') == NULL){

			redirect("cadastro/index");

		} else{


			$data['cliente'] = $this->Pandel2->getCliente();

			$this->load->view('nav3');
			$this->load->view('cliente', $data);

		}

	}

	public function verCliente($ID=NULL){

		if($this->session->userdata('email') == NULL){

			redirect("cadastro/index");

		} else{

			if($ID == NULL){

				redirect("cliente/Cliente");

			}

			$data['cliente'] = $this->Pandel3->verCliente($ID);

			$this->load->view('nav3');
			$this->load->view('VerCliente',$data);

		}

	}

	public function editCliente($ID=NULL){

		if($this->session->userdata('email') == NULL){

			redirect("cadastro/index");

		} else{

			if($ID == NULL){

				redirect("cliente/Cliente");
			}

			$data['cliente'] = $this->Pandel3->verCliente($ID);

			$this->load->view("nav3");
			$this->load->view("EditCliente", $data);

		}

	}

	public function deleteCliente($ID=NULL){

		if($ID == NULL){

			redirect("cliente/Cliente");
		}

		$query = $this->Pandel3->verCliente($ID);

		if($query != NULL){

			$this->Pandel3->deleteCliente($query->ID);
		}

		redirect("cliente/Cliente");
	}


	public function Fornecedor(){

		if($this->session->userdata('email') == NULL){

			redirect("cadastro/index");

		} else{


			$data['fornecedor'] = $this->Pandel2->getForn();

			$this->load->view('nav3');
			$this->load->view('fornecedor', $data);

		}

	}

	public function deleteForn($ID=NULL){

		if($ID == NULL){

			redirect("cliente/Fornecedor");
		}

		$query = $this->Pandel3->verFornecedor($ID);

		if($query != NULL){

			$this->Pandel3->deleteFornecedor($query->ID);
			redirect("cliente/Fornecedor");
		}

	}

}
