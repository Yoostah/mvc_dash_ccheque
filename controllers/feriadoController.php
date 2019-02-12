<?php
class feriadoController extends controller {

	public function index() {
		$dados = array(
			'titulo' => 'Index Feriado',
			'menu' => 'feriado' 
		);
		$this->loadTemplate('feriado', $dados);

	}
	
	public function cadastro() {
		$dados = array();	

		$this->loadTemplate('cadferiado', $dados);

	}

	public function consulta() {
		$dados = array();	

		$this->loadTemplate('consferiado', $dados);

	}

}