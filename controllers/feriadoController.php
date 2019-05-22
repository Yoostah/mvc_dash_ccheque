<?php
class feriadoController extends controller {

	public function index() {
		$feriado = new Feriado();

		$usu_id = 1;

		$dados = array(
			'titulo' => 'Index Feriado',
			'menu' => 'feriado',
			'feriados' => $feriado->listFeriados($usu_id) 
		);

		$this->loadTemplate('feriado', $dados);
		
	}

	public function cadastrar() {
		$estados = new _UF();

		$estados = $estados->listUF();

		$dados = array(
			'titulo' => 'Cadastrar Feriado',
			'menu' => 'feriado',
			'estados' => $estados
		);	

		$this->loadTemplate('cadferiado', $dados);

	}

	public function deletar() {
		if (isset($_POST['id']) && !empty($_POST['id'])){
			$id = addslashes($_POST['id']);
			$feriado = new Feriado();
			$feriado->deleteFeriado($id);
		}
		$this->index();
	}

	public function editar() {
		if (isset($_POST['id']) && !empty($_POST['id'])){
			$estados = new _UF();

			$estados = $estados->listUF();				

			$id = addslashes($_POST['id']);
			$feriado = new Feriado();

			//Retorna um JSON com os dados do feriado e converte em um array associativo para ser usado no getTemplate
			$feriado = json_decode($feriado->getFeriado($id), true);

			$dados = array(				
				'feriado' => $feriado,
				'estados' => $estados
			);
	
			$this->getTemplatePart('temp__edit_feriado', $dados);
						
		}else{
			echo 'Nenhum ID recebido';
		}	

	}

	public function selectMun_UF(){
		$municipios = new _MUNICIPIO();

		$municipios_json = $municipios->listMun_UF_JSON($_GET['cod_estados']);
		
		echo $municipios_json;

	}

	public function salvar() {
		
		$feriado = new Feriado();		
		
		//UPDATE
		if ( (isset($_POST['user']) && !empty($_POST['user'])) && (isset($_POST['feriado']) && !empty($_POST['feriado'])) ) {
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
		}else{ //CADASTRO
			$usu_id = 1;
			
			$feriado_nome = $_POST['nome'];
			$feriado_data = $_POST['data'];
			$feriado_tipo = $_POST['tipo'];
			$feriado_municipio = $_POST['cod_cidade'];

			if(isset($_POST['descricao']) && !empty($_POST['descricao']))
				$feriado_descricao = $_POST['descricao'];
			else
				$feriado_descricao = '';		
			
			$cadastro = $feriado->addFeriado($usu_id, $feriado_nome, $feriado_data, $feriado_tipo, $feriado_municipio, $feriado_descricao);
			
			$dados = array(
				'titulo' => 'Cadastro Feriado',
				'menu' => 'feriado',
				'cadastro' => $cadastro,
				'feriados' => $feriado->listFeriados($usu_id) 
			);

			$this->loadTemplate('feriado', $dados);
		}	
		
		
	}


}