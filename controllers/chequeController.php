<?php
class chequeController extends controller {

	public function index() {
		$dados = array();		

		$this->loadViewInTemplate('cheque', $dados);

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