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

	public function cadastrar() {
		$usu_id = 1;

		$bancos = new Banco();

		$bancos = $bancos->listBancos($usu_id);

		$dados = array(
			'titulo' => 'Cadastrar Cheque',
			'menu' => 'feriado',
			'bancos' => $bancos
		);	

		$this->loadTemplate('cadcheque', $dados);

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

	public function salvar() {
		
		$cheque = new Cheque();		
		
		//UPDATE
		/*if ( (isset($_POST['user']) && !empty($_POST['user'])) && (isset($_POST['feriado']) && !empty($_POST['feriado'])) ) {
			$user = $_POST['user'];
			$id_feriado = $_POST['feriado'];

			$feriado = json_decode($feriado->getFeriado($id_feriado), true);
			
			//REVALIDAÇÃO DE ID/USER
			if($feriado['fer_usu'] == $user && $feriado['fer_id'] == $id_feriado){
				$feriado = new Feriado();
				$feriado_nome = $_POST['nome'];
				$feriado_data = $_POST['data'];
				$feriado_tipo = $_POST['tipo'];
				$feriado_municipio = $_POST['cod_cidade'];

				if(isset($_POST['descricao']) && !empty($_POST['descricao']))
					$feriado_descricao = $_POST['descricao'];
				else
					$feriado_descricao = '';		
				
				$update = $feriado->updFeriado($user, $id_feriado, $feriado_nome, $feriado_data, $feriado_tipo, $feriado_municipio, $feriado_descricao);
				
				$usu_id = 1;

				$dados = array(
					'titulo' => 'Atualização Feriado',
					'menu' => 'feriado',
					'update' => $update,
					'feriados' => $feriado->listFeriados($usu_id) 
				);

				$this->loadTemplate('feriado', $dados);
			}	
		}else{ //CADASTRO*/
			$usu_id = 1;
			

			$cheque_banco = addslashes($_POST['chq_banco']);
			$cheque_num = addslashes($_POST['chq_num']);
			$cheque_agencia = addslashes($_POST['chq_agencia']);
			$cheque_conta = addslashes($_POST['chq_conta']);
			$cheque_bom_para = addslashes($_POST['chq_bom_para']);
			$cheque_valor = addslashes($_POST['chq_valor']);
			$cheque_titular = addslashes($_POST['chq_titular']);
			$cheque_cliente = addslashes($_POST['chq_cliente']);
			$cheque_status = addslashes($_POST['chq_status']);

			$cadastro = $cheque->addCheque($cheque_banco, $cheque_num, $cheque_agencia, $cheque_conta, $cheque_bom_para, $cheque_valor, $cheque_titular, $cheque_cliente, $usu_id, $cheque_status);
			
			$dados = array(
				'titulo' => 'Cadastro Cheque',
				'menu' => 'cheque',
				'cadastro' => $cadastro,
				'cheques' => $cheque->listCheques($usu_id) 
			);

			$this->loadTemplate('cheque', $dados);
		//}	
		
		
	}

}