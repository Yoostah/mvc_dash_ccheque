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
	
	public function editar() {
		if (isset($_POST['id']) && !empty($_POST['id'])){
			$usu_id = 1;

			$id = addslashes($_POST['id']);
			$cheque = new Cheque();
			$bancos = new Banco();

			//Retorna um JSON com os dados do cheque e converte em um array associativo para ser usado no getTemplate
			$cheque = json_decode($cheque->getCheque($id, $usu_id), true);

			$dados = array(				
				'cheque' => $cheque,
				'bancos' => $bancos->listBancos($usu_id)
			);
	
			$this->getTemplatePart('temp__edit_cheque', $dados);
						
		}else{
			echo 'Nenhum ID recebido';
		}	

	}

	public function deletar() {
		if (isset($_POST['id']) && !empty($_POST['id'])){
			$usu_id = 1;
			$id = addslashes($_POST['id']);
			$cheque = new Cheque();
			$cheque->deleteCheque($id, $usu_id);			
		}
		$this->index();
	}

}