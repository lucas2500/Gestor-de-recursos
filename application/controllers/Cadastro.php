<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {

	function __construct() {         
		parent::__construct(); 

		$this->load->model('Cadastro_model', 'Pandel');
		$this->load->model('Produto_model', 'Pandel2');
		$this->load->helper('date');
		$this->load->library('session');

	}


	public function index(){

		$this->load->view('login');

	}

	public function login(){

		$this->load->library('form_validation');  
		$this->form_validation->set_rules('email', 'Username', 'required');  
		$this->form_validation->set_rules('senha', 'Password', 'required');

		if($this->form_validation->run()){

			$email = $this->input->post('email');  
			$senha = $this->input->post('senha');

			if($this->Pandel2->logar($email,$senha)){

				$session_data = array('email'=> $email );  
				$this->session->set_userdata($session_data);

				redirect("cadastro/menuPrincipal");

			}  else{

				$this->load->view('loginErro');

			} 

		}

	}

	public function menuPrincipal(){

		if($this->session->userdata('email') == NULL){

			redirect("cadastro/index");

		} else{

			$nomeUser = $this->session->userdata('email');

			$data['nomeUser'] = $this->Pandel2->showUser($nomeUser);


			$data['produtos'] = $this->Pandel->getEstoque();
			$data['fornada'] = $this->Pandel->getFornada();
			$data['ficha'] = $this->Pandel->getFichaProducao();
			$data['user'] = $this->Pandel2->getUser();
			$data['cliente'] = $this->Pandel2->getCliente();

			$this->load->view('nav');
			$this->load->view('Pandel', $data);

		}


	}

	public function Financeiro(){

		if($this->session->userdata('email') == NULL){

			redirect("cadastro/index");

		} else{

			$data['vendas'] = $this->Pandel->getVendas();
			$data['quitVendas'] = $this->Pandel->getVendasRelatorio();
			$data['duplicata'] = $this->Pandel->getDuplicata();
			$data['compras'] = $this->Pandel->getComprasRelatorio();
			$data['forn'] = $this->Pandel2->getForn();
			$data['produto'] = $this->Pandel2->getProduto();

			$this->load->view('nav2');
			$this->load->view('Pandel2', $data);

		}

	}

	public function cadProd(){

		$data['nomeProd'] = $this->input->post('nomeProd');
		$data['prodPeso'] = $this->input->post('prodPeso');
		$data['qtdMin'] = $this->input->post('qtdMin');
		$data['valorUnit'] = $this->input->post('valorUnit');
		$data['qtdKG'] = $this->input->post('qtdKG');


		if($this->input->post('ID') != NULL){

			$stringdedata = " %d/%m/%Y";
			$date = time();

			$data['atualizacao'] = mdate($stringdedata, $date);

			$this->Pandel->editarEstoque($data, $this->input->post('ID'));
			redirect("cadastro/menuPrincipal");

		}

		$stringdedata = " %d/%m/%Y";
		$date = time();

		$data['atualizacao'] = mdate($stringdedata, $date);

		$this->Pandel->addProdutos($data);

		redirect("cadastro/menuPrincipal");

	}


	public function Expedicao(){

		$data['nomeCliente'] = $this->input->post('nomeCliente');
		$data['descricao'] = $this->input->post('descricao');
		$data['valorTotal'] = $this->input->post('valorTotal');
		$data['dataVenda'] = $this->input->post('dataVenda');

		$this->Pandel->addExpedicao($data);

		redirect("cadastro/menuPrincipal");



	}

	public function Duplicatas(){


		$data['nomeForn'] = $this->input->post('nomeForn');
		$data['descricao'] = $this->input->post('descricao');
		$data['valorTotal'] = $this->input->post('valorTotal');
		$data['dtCompra'] = $this->input->post('dtCompra');
		$data['dtVencimento'] = $this->input->post('dtVencimento');

		$this->Pandel->addDuplicata($data);
		

		redirect("cadastro/Financeiro");
	}

	public function quitarVendas($ID=NULL){

		if($ID == NULL){

			redirect("cadastro/Financeiro");
		}

		$query = $this->Pandel->getVendasByID($ID);

		if($query != NULL){

			$this->Pandel->insertVenda($query);

			$this->Pandel->quitVenda($query->ID);
			redirect("cadastro/Financeiro");


		}

	}

	public function quitarCompras($ID=NULL){

		if($ID == NULL){

			redirect("cadastro/Financeiro");

		}

		$query = $this->Pandel->getComprasByID($ID);

		if($query != NULL){

			$this->Pandel->insertCompra($query);

			$this->Pandel->quitCompra($query->ID);
			redirect("cadastro/Financeiro");

		}
	}

	public function deleteCompra($ID=NULL){

		if($ID == NULL){

			redirect("cadastro/Financeiro");

		}

		$query = $this->Pandel->getComprasRegistroByID($ID);

		if($query != NULL){

			$this->Pandel->deleteCompra($query->ID);
			redirect("cadastro/Financeiro");

		}
	}

	public function deleteVenda($ID=NULL){

		if($ID == NULL){

			redirect("cadastro/Financeiro");

		}

		$query = $this->Pandel->getVendasRegistroByID($ID);

		if($query != NULL){

			$this->Pandel->deleteVenda($query->ID);
			redirect("cadastro/Financeiro");

		}
	}

	public function verCompra($ID=NULL){

		if($this->session->userdata('email') == NULL){

			redirect("cadastro/index");

		} else{

			if($ID == NULL){

				redirect("cadastro/Financeiro");

			}

			$query = $this->Pandel->getVendasRegistroByID($ID);

			if($query != NULL){

				$data['detalhes'] = $query;
				$this->load->view('nav3');
				$this->load->view('Detalhes', $data);

			}

		}
	}


	public function editEstoque($ID=NULL){

		if($this->session->userdata('email') == NULL){

			redirect("cadastro/index");

		} else{



			if($ID == NULL){

				redirect("cadastro/Financeiro");

			}

			$query = $this->Pandel->getProdutosByID($ID);

			if($query != NULL){

				$data['produtos'] = $query;
				$this->load->view('nav3');
				$this->load->view('editEstoque', $data);

			}

		}
	}

	public function deleteProduto($ID=NULL){

		if($ID == NULL){

			redirect("cadastro/index");

		}

		$query = $this->Pandel->getProdutosByID($ID);

		if($query != NULL){

			$this->Pandel->deleteProd($query->ID);
			redirect("cadastro/menuPrincipal");

		}
	}

	public function Fornada(){


		$data['tipoProduto'] = $this->input->post('tipoProduto');
		$data['qtdProduzida'] = $this->input->post('qtdProduzida');

		$stringdedata = " %d/%m/%Y";
		$date = time();
		$data['dataFornada'] = mdate($stringdedata, $date);

		$this->Pandel->addFornada($data);

		$data2['tipoProduto'] = $this->input->post('tipoProduto');

		if($data['tipoProduto'] == "PÃO FRANCÊS CONGELADO"){


			$this->Pandel2->addFrances($data2);

		}

		elseif($data['tipoProduto'] == "PÃO DOCE COMPRIDO CONGELADO"){


			$this->Pandel2->addDoceComprido($data2);

		}

		elseif($data['tipoProduto'] == "PÃO DOCE CORTADO CONGELADO"){


			$this->Pandel2->addDoceCortado($data2);

		}

		elseif($data['tipoProduto'] == "PÃO DOCE ENROLADO CONGELADO"){

			$this->Pandel2->addDoceEnrolado($data2);

		}

		elseif($data['tipoProduto'] == "PÃO BROTE CONGELADO"){

			$this->Pandel2->addBrote($data2);

		}

		elseif($data['tipoProduto'] == "PÃO CARTEIRA CONGELADO"){

			$this->Pandel2->addCarteira($data2);

		}

		elseif($data['tipoProduto'] == "PÃO SEDA CONGELADO"){

			$this->Pandel2->addSeda($data2);

		}

		elseif($data['tipoProduto'] == "PÃO CRIOULO CONGELADO"){

			$this->Pandel2->addCrioulo($data2);
		}

		elseif($data['tipoProduto'] == "PÃO BOLINHA CONGELADO"){

			$this->Pandel2->addBolinha($data2);

		}

		redirect("cadastro/menuPrincipal");
	}


	public function deleteFornada($ID=NULL){

		if($ID == NULL){

			redirect("cadastro/index");
		}

		$query = $this->Pandel->getFornadaByID($ID);

		if($query != NULL){

			$this->Pandel->deleteFornada($query->ID);
			redirect("cadastro/menuPrincipal");

		}
	}

	public function cadFichaTecnica(){

		$data['nomeProd'] = $this->input->post('nomeProd');
		$data['farinhaTrigo'] = $this->input->post('farinhaTrigo');
		$data['sal'] = $this->input->post('sal');
		$data['acucar'] = $this->input->post('acucar');
		$data['adipanC'] = $this->input->post('adipanC');
		$data['docemix'] = $this->input->post('docemix');
		$data['fermentoInsta'] = $this->input->post('fermentoInsta');
		$data['agua'] = $this->input->post('agua');

		$this->Pandel->cadFichaProducao($data);
		redirect("cadastro/menuPrincipal");


	}

	public function deleteFichaTecnica($ID=NULL){

		if($ID == NULL){

			redirect("cadastro/index");
		}


		$query = $this->Pandel->getFichaByID($ID);

		if($query != NULL){

			$this->Pandel->deleteFichaProducao($query->ID);
			redirect("cadastro/menuPrincipal");

		}

	}

	public function updateEstoque(){

		$data['codProd'] = $this->input->post('codProd');
		$data['peso'] = $this->input->post('peso');
		$data['totalKg'] = $this->input->post('totalKg');

		$this->Pandel->entradaEstoque($data);
		redirect("cadastro/menuPrincipal");

	}

	public function BaixarEstoque(){

		$data['codProd'] = $this->input->post('codProd');
		$data['qtdUsada'] = $this->input->post('qtdUsada');

		// var_dump($data);
		$this->Pandel->saidaEstoque($data);
		redirect("cadastro/menuPrincipal");

	}

	public function editFornada($ID=NULL){

		if($this->session->userdata('email') == NULL){

			redirect("cadastro/index");

		} else {

			if($ID == NULL){

				redirect("cadastro/menuPrincipal");
			}

			$query['fornada'] = $this->Pandel->getFornadaByID($ID);

			if($query != NULL){

				$this->load->view('nav3');
				$this->load->view('baixarEstoque',$query );
			}

		}

	}

	public function alterarFornada(){

		$data['tipoProduto'] = $this->input->post('tipoProduto');
		$data['qtdProduzida'] = $this->input->post('qtdProduzida');
		$data['dataFornada'] = $this->input->post('dataFornada');

		if($this->input->post('ID') != NULL){

			$this->Pandel2->editarFornada($data, $this->input->post('ID'));

		}

		redirect("cadastro/menuPrincipal");
	}

	public function addUsuario(){

		$data['nome'] = $this->input->post('nome');
		$data['email'] = $this->input->post('email');
		$data['senha'] = sha1($this->input->post('senha'));

		$this->Pandel2->cadUser($data);

		redirect("cadastro/menuPrincipal");


	}

	public function deleteUser($ID=NULL){

		if($ID == NULL){

			redirect("cadastro/menuPrincipal");
		}

		$query = $this->Pandel2->getUserById($ID);

		if($query != NULL){

			$this->Pandel2->deleteUser($query->ID);

		}

		redirect("cadastro/menuPrincipal");

	}

	public function Sair(){

		$this->session->unset_userdata("email");
		redirect("cadastro/index");

	}

	public function updateSenha(){

		$data['senha'] = sha1($this->input->post('senha'));

		$this->Pandel2->alterarSenha($this->input->post('email'), $data);

		$this->session->unset_userdata('email');

		redirect("cadastro/menuPrincipal");


	}

}
