<?php
class bancoController extends controller {

	public function index() {
		$banco = new Banco();

		$usu_id = 1;

		$dados = array(
			'titulo' => 'Index Banco',
			'menu' => 'banco',
			'bancos' => $banco->listBancos($usu_id) 
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