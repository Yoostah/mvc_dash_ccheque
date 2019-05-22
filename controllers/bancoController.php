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
	
	public function cadastrar() {
		$banco = new Banco();

		$usu_id = 1;

		$dados = array(
			'titulo' => 'Index Banco',
			'menu' => 'banco',
			'bancos' => $banco->listBancos($usu_id)
		);	

		$this->loadTemplate('cadbanco', $dados);

	}

	public function deletar() {
		if (isset($_POST['id']) && !empty($_POST['id'])){
			$usu_id = 1;
			$id = addslashes($_POST['id']);
			$cod = addslashes($_POST['cod']);
			$banco = new Banco();
			$banco->deleteBanco($id);

			if($banco){
				unlink('./assets/imagens/_bancos/'.$usu_id.'/_logo_'.$cod.'.png');
			}
		}
		$this->index();
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

	public function salvar() {
		
		$banco = new Banco();		
		
		//UPDATE
		if ( (isset($_POST['user']) && !empty($_POST['user'])) && (isset($_POST['banco']) && !empty($_POST['banco'])) ) {
			$user = addslashes($_POST['user']);
			$id_banco = addslashes($_POST['banco']);
			$cod_banco = addslashes($_POST['codigo']);
			
			$banco = json_decode($banco->getBanco($id_banco, $user), true);
			
			//REVALIDAÇÃO DE ID/USER
			if($banco['banco_usu'] == $user && $banco['banco_id'] == $id_banco){
				$banco = new Banco();
				
				if ($_FILES['banco_logo']['size'] != 0)
					$banco_logo = $_FILES['banco_logo'];
				
				$banco_nome = $_POST['banco_nome'];
				$banco_cod = $_POST['banco_cod'];					
				
				$update = $banco->updBanco($user, $id_banco, $banco_nome, $banco_cod);
				
				if($update){
					if ($_FILES['banco_logo']['size'] != 0){
						unlink('./assets/imagens/_bancos/'.$user.'/_logo_'.$cod_banco.'.png');
						$this->_redimensionarLogo($banco_logo, $user, $banco_cod);
					}else{
						rename ('./assets/imagens/_bancos/'.$user.'/_logo_'.$cod_banco.'.png', './assets/imagens/_bancos/'.$user.'/_logo_'.$banco_cod.'.png');
					}
				}

				$dados = array(
					'titulo' => 'Atualização Banco',
					'menu' => 'banco',
					'update' => $update,
					'bancos' => $banco->listBancos($user) 
				);

				$this->loadTemplate('banco', $dados);
			}	
		}else{ //CADASTRO
			$usu_id = 1;			

			$banco_logo = $_FILES['banco_logo'];
			$banco_nome = $_POST['banco_nome'];
			$banco_cod = $_POST['banco_cod'];

			$cadastro = $banco->addBanco($usu_id, $banco_cod, $banco_nome);
			if($cadastro){
				$this->_redimensionarLogo($banco_logo, $usu_id, $banco_cod);
			}

			$dados = array(
				'titulo' => 'Cadastro Banco',
				'menu' => 'banco',
				'cadastro' => $cadastro,
				'bancos' => $banco->listBancos($usu_id) 
			);

			$this->loadTemplate('banco', $dados);
		}	
		
		
	}

	public function _redimensionarLogo($banco_logo, $usu_id, $banco_cod){
		$maxDim = 30;
		$file_name = $banco_logo['tmp_name'];
		list($width, $height, $type, $attr) = getimagesize( $file_name );
		if ( $width > $maxDim || $height > $maxDim ) {
			$target_filename = $file_name;
			$ratio = $width/$height;
			if( $ratio > 1) {
				$new_width = $maxDim;
				$new_height = $maxDim/$ratio;
			} else {
				$new_width = $maxDim*$ratio;
				$new_height = $maxDim;
			}
			$src = imagecreatefromstring( file_get_contents( $file_name ) );
			$dst = imagecreatetruecolor( $new_width, $new_height );
			imagealphablending($dst, false);
			imagesavealpha( $dst, true );
			imagecopyresampled( $dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
			imagedestroy( $src );
			imagepng( $dst, $target_filename ); // adjust format as needed
			imagedestroy( $dst );
			move_uploaded_file($target_filename, './assets/imagens/_bancos/'.$usu_id.'/_logo_'.$banco_cod.'.png');
		}else{
			move_uploaded_file($file_name, './assets/imagens/_bancos/'.$usu_id.'/_logo_'.$banco_cod.'.png');
		}
	}

}