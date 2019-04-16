<div class="row">
	<div class="col-md-12">
		<div class="card card-plain">
			<div class="card-header card-header-primary">
				<h4 class="card-title">Cheques</h4>
				<p class="card-category">Relação dos Cheques cadastrados</p>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<th>BANCO</th>
							<th>AGÊNCIA</th>
							<th>C/C</th>
							<th>Nº CHEQUE</th>
							<th>VALOR CHEQUE</th>
							<th>TAXA</th>
							<th>REC. EM</th>
							<th>BOM P/</th>
							<th>DATA COMP</th>
							<th>DIAS</th>
							<th>VALOR CORRIGIDO</th>
							<th>CLIENTE</th>
							<th>TITULAR</th>
							<th class="text-right">Opções</th>							
						</thead>
						<tbody>
							<?php 
								if (count($cheques) == 0){
									echo '<tr><td class="no_result" colspan="100">Nenhum Cheque cadastrado.</td></tr>';
								}else{
									foreach($cheques as $key => $value){								
										echo '<tr>';
										echo '<td><img src="'.BASE_URL.'assets/imagens/'.$value['banco_logo'].'.png?'.time().'"></td>';
										echo '<td>'.$value['cheque_agencia'].'</td>';
										echo '<td>'.$value['cheque_conta_corrente'].'</td>';
										echo '<td>'.$value['cheque_num'].'</td>';
										echo '<td>'.number_format($value['cheque_valor'],2, ',', '.').'</td>';
										echo '<td>'.$value['cheque_taxa'].'%</td>';
										echo '<td>'.$value['cheque_rec_em'].'</td>';
										echo '<td>'.$value['cheque_bom_para'].'</td>';
										echo '<td>'.$value['cheque_data_comp'].'</td>';
										echo '<td>'.$value['cheque_dias_correcao'].'</td>';
										echo '<td>'.number_format($value['cheque_valor_corrigido'],2, ',', '.').'</td>';
										echo '<td>'.$value['cheque_cliente'].'</td>';
										echo '<td>'.$value['cheque_titular'].'</td>';
										echo '<td class="td-actions text-right">
												<button type="button" rel="tooltip" data-placement="left" data-original-title="Editar Cheque" class="btn btn-link" href="javascript:;" onclick="editar_cheque('.$value['cheque_id'].')"><i class="material-icons">edit</i></button>
												<button type="button" rel="tooltip" data-placement="left" data-original-title="Deletar Cheque" class="btn btn-link" href="javascript:;" onclick="deletar_cheque('.$value['cheque_id'].')"><i class="material-icons">close</i></button>											
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
								<h5 class="modal-title">Edição de Cheque</h5>
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
			<button formaction="<?php echo BASE_URL; ?>cheque/cadastrar" class="btn btn-warning pull-right">Adicionar Cheque</button>			
		</form>		
        <div class="clearfix"></div>
	</div>
</div>
