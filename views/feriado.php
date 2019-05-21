<?php 
//$string = file_get_contents("./feriados.json");
//$json = json_decode($string, true);

?>
<div class="row">
	<div class="col-md-12">
		<div class="card card-plain">
			<div class="card-header card-header-<?php echo $this->color_config['cor_forms']; ?>">
				<h4 class="card-title">Feriados</h4>
				<p class="card-category">Relação dos Feriados cadastrados</p>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<th>Data</th>
							<th>Nome</th>
							<th>Tipo</th>
							<th>Cidade</th>
							<th class="text-right">Opções</th>							
						</thead>
						<tbody>
							<?php 
								if (count($feriados) == 0){
									echo '<tr><td class="no_result" colspan="100">Nenhum Feriado cadastrado.</td></tr>';
								}else{
									foreach($feriados as $key => $value){								
										echo '<tr>';
										echo '<td>'.$value['fer_data'].'</td>';
										echo '<td>'.$value['fer_nome'].'</td>';
										echo '<td>'.$value['fer_tipo'].'</td>';
										echo '<td>'.$value['fer_cidade'].'</td>';
										echo '<td class="td-actions text-right">
												<button rel="tooltip" data-trigger="hover" data-placement="left" data-original-title="'.$value['fer_descricao'].'" class="btn btn-link tooltip-info"><i class="material-icons">info</i></button>
												<button type="button" class="btn btn-link" href="javascript:;" onclick="editar_feriado('.$value['fer_id'].')"><i class="material-icons">edit</i></button>
												<button type="button" class="btn btn-link" href="javascript:;" onclick="deletar_feriado('.$value['fer_id'].')"><i class="material-icons">close</i></button>											
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
										<h4 class="card-title">Edição de Feriado</h4>										
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
			<button formaction="<?php echo BASE_URL; ?>feriado/cadastrar" class="btn btn-<?php echo $this->color_config['cor_forms']; ?> pull-right">Adicionar Feriado</button>			
		</form>		
        <div class="clearfix"></div>
	</div>
</div>

