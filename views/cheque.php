<?php //$this->debug($cheques); exit;
?>
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
										echo '<td>'.$value['chq_agencia'].'</td>';
										echo '<td>'.$value['chq_conta'].'</td>';
										echo '<td>'.$value['chq_num'].'</td>';
										echo '<td>'.$value['chq_valor'].'</td>';
										echo '<td>TAXA</td>';
										echo '<td>REC EM</td>';
										echo '<td>'.$value['chq_bom_para'].'</td>';
										echo '<td>DATA COMP</td>';
										echo '<td>DIAS</td>';
										echo '<td>VALOR CORRIGIDO</td>';
										echo '<td>'.$value['chq_cliente'].'</td>';
										echo '<td>'.$value['chq_titular'].'</td>';
										echo '<td class="td-actions text-right">
												<button type="button" class="btn btn-link" href="javascript:;" onclick="editar_cheque('.$value['chq_id'].')"><i class="material-icons">edit</i></button>
												<button type="button" class="btn btn-link" href="javascript:;" onclick="deletar_cheque('.$value['chq_id'].')"><i class="material-icons">close</i></button>											
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
										<h4 class="card-title">Edição de Cheque</h4>										
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
			<button formaction="<?php echo BASE_URL; ?>cheque/cadastrar" class="btn btn-warning pull-right">Adicionar Cheque</button>			
		</form>		
        <div class="clearfix"></div>
	</div>
</div>
