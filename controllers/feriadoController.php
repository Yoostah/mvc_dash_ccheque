<?php
class feriadoController extends controller {

	public function index() {
		$feriado = new Feriado();

		$usu_id = 1;

		$dados = array(
			'titulo' => 'Index Feriado',
			'menu' => 'feriado',
			'feriados' => $feriado->listFeriado($usu_id) 
		);

		$this->loadTemplate('feriado', $dados);



	}

	public function cadastrar() {
		$dados = array(
			'titulo' => 'Cadastrar Feriado',
			'menu' => 'feriado',
		);	

		$this->loadTemplate('cadferiado', $dados);

	}

	/*public function consulta() {
		$dados = array();	

		$this->loadTemplate('consferiado', $dados);

	}*/

}