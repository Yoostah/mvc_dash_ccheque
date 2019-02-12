<?php
class homeController extends controller {

	public function index() {
		$dados = array(
			'titulo' => 'Painel de Controle',
			'menu' => 'home'
		);		
		
		$this->loadTemplate('home', $dados);

	}

}