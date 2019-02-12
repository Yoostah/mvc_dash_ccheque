<?php
class bancoController extends controller {

	public function index() {
		$dados = array(
			'titulo' => 'Index Banco',
			'menu' => 'banco' 
		);
		$this->loadTemplate('banco', $dados);

	}
	
	public function cadastro() {
		$dados = array();	

		$this->loadTemplate('cadbanco', $dados);

	}

	public function consulta() {
		$dados = array();	

		$this->loadTemplate('consbanco', $dados);

	}

}