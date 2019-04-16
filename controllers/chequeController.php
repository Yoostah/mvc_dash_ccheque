<?php
class chequeController extends controller {

	public function index() {
		$cheque = new Cheque();

		$usu_id = 1;

		$dados = array(
			'titulo' => 'Index Cheque',
			'menu' => 'cheque',
			'cheques' => $cheque->listCheques($usu_id) 
		);

		$this->loadTemplate('cheque', $dados);

	}
	
	public function cadastro() {
		$dados = array();	

		$this->loadTemplate('cadcheque', $dados);

	}

	public function consulta() {
		$dados = array();	

		$this->loadTemplate('conscheque', $dados);

	}

}