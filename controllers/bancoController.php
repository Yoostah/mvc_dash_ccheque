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

	public function editar() {
		if (isset($_POST['id']) && !empty($_POST['id'])){	

			$usu_id = 1;

			$id = addslashes($_POST['id']);
			$banco = new Banco();

			//Retorna um JSON com os dados do banco e converte em um array associativo para ser usado no getTemplate
			$banco = json_decode($banco->getBanco($id, $usu_id), true);

			$dados = array(				
				'banco' => $banco
			);
	
			$this->getTemplatePart('temp__edit_banco', $dados);
						
		}else{
			echo 'Nenhum ID recebido';
		}	

	}

}