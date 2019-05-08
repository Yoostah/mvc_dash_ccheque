<div class="row">
	<div class="col-md-12">
		<div class="card card-plain">
			<div class="card-header card-header-primary">
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
				<div id="edit_modal" class="modal" tabindex="-1" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edição de Banco</h5>
							</div>
							<div class="modal-body">
								<p>Modal body text goes here.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<form>
			<button formaction="<?php echo BASE_URL; ?>banco/cadastrar" class="btn btn-warning pull-right">Adicionar Banco</button>			
		</form>		
        <div class="clearfix"></div>
	</div>
</div>
