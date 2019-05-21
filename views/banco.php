<div class="row">
	<div class="col-md-12">
		<div class="card card-plain">
			<div class="card-header card-header-<?php echo $this->color_config['cor_forms']; ?>">
				<h4 class="card-title">Bancos</h4>
				<p class="card-category">Relação dos Bancos cadastrados</p>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<th>Logo</th>
							<th>Código</th>
							<th>Nome</th>
							<th class="text-right">Opções</th>							
						</thead>
						<tbody>
							<?php 
								if (count($bancos) == 0){
									echo '<tr><td class="no_result" colspan="100">Nenhum Banco cadastrado.</td></tr>';
								}else{
									foreach($bancos as $key => $value){								
										echo '<tr>';
										echo '<td><img src="'.BASE_URL.'assets/imagens/'.$value['banco_logo'].'.png?'.time().'"></td>';
										echo '<td>'.$value['banco_cod'].'</td>';
										echo '<td>'.$value['banco_nome'].'</td>';
										echo '<td class="td-actions text-right">
												<button type="button" class="btn btn-link" href="javascript:;" onclick="editar_banco('.$value['banco_id'].')"><i class="material-icons">edit</i></button>
												<button type="button" class="btn btn-link" href="javascript:;" onclick="deletar_banco('.$value['banco_id'].')"><i class="material-icons">close</i></button>											
											  </td>';									
										echo '</tr>';
									} 
								}	
								?>
							
						</tbody>
					</table>
				</div>
				<div id="edit_modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-lg">
						<div class="modal-content">
							<div class="card card-signup card-plain">
								<div class="modal-header">
									<div class="card-header card-header-<?php echo $this->color_config['cor_forms']; ?> text-center">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											<i class="material-icons">fechar</i>
										</button>
										<h4 class="card-title">Edição de Banco</h4>										
									</div>
								</div>
								<div class="modal-body"></div>								
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<form>
			<button formaction="<?php echo BASE_URL; ?>banco/cadastrar" class="btn btn-<?php echo $this->color_config['cor_forms']; ?> pull-right">Adicionar Banco</button>			
		</form>		
        <div class="clearfix"></div>
	</div>
</div>
