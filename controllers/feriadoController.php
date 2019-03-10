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
		$estados = new _UF();

		$estados = $estados->listUF();

		$dados = array(
			'titulo' => 'Cadastrar Feriado',
			'menu' => 'feriado',
			'estados' => $estados
		);	

		$this->loadTemplate('cadferiado', $dados);

	}

	public function selectMun_UF(){
		$municipios = new _MUNICIPIO();

		$municipios_json = $municipios->listMun_UF_JSON($_GET['cod_estados']);
		
		echo $municipios_json;

	}

	public function salvar() {

		$feriado = new Feriado();

		$usu_id = 1;

		$feriado_nome = $_POST['nome'];
		$feriado_data = date("Y-m-d", strtotime($_POST['data']));
		$feriado_tipo = $_POST['tipo'];
		$feriado_municipio = $_POST['cod_cidade'];

		if(isset($_POST['descricao']) && !empty($_POST['descricao']))
			$feriado_descricao = $_POST['descricao'];
		else
			$feriado_descricao = '';		
		
		$cadastro = $feriado->addFeriado($usu_id, $feriado_nome, $feriado_data, $feriado_tipo, $feriado_municipio, $feriado_descricao);
		
		$dados = array(
			'titulo' => 'Index Feriado',
			'menu' => 'feriado',
			'cadastro' => $cadastro,
			'feriados' => $feriado->listFeriado($usu_id) 
		);

		$this->loadTemplate('feriado', $dados);	
		
		
	}

}