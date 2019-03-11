<?php 
//$string = file_get_contents("./feriados.json");
//$json = json_decode($string, true);

?>
<div class="row">
	<div class="col-md-12">
		<div class="card card-plain">
			<div class="card-header card-header-primary">
				<h4 class="card-title">Feriados</h4>
				<p class="card-category">Relação dos Feriados cadastrados</p>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<th>
								Data
							</th>
							<th>
								Nome
							</th>
							<th>
								Tipo
							</th>
							<th>
								Cidade
							</th>
							<th>
								Opções
							</th>							
						</thead>
						<tbody>
							<?php 
								if (count($feriados) == 0){
									echo '<tr><td class="no_result" colspan="5">Nenhum Feriado cadastrado.</td></tr>';
								}else{
									foreach($feriados as $key => $value){								
										echo '<tr>';
										echo '<td>'.$value['fer_data'].'</td>';
										echo '<td>'.$value['fer_nome'].'</td>';
										echo '<td>'.$value['fer_tipo'].'</td>';
										echo '<td>'.$value['fer_cidade'].'</td>';
										echo '<td class="td-actions text-right">											
												<a href="javascript:;" onclick="editar_feriado('.$value['fer_id'].')"><i class="material-icons">edit</i></a>
												<a href="javascript:;" onclick="deletar_feriado('.$value['fer_id'].')"><i class="material-icons">close</i></a>											
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
								<h5 class="modal-title">Edição de Feriado</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<p>Modal body text goes here.</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-warning">Salvar Alterações</button>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<form>
			<button formaction="<?php echo BASE_URL; ?>feriado/cadastrar" class="btn btn-warning pull-right">Adicionar Feriado</button>			
		</form>		
        <div class="clearfix"></div>
	</div>
</div>
