<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-header card-header-<?php echo $this->color_config['cor_forms']; ?>">
				<h4 class="card-title">Cadastro de Feriado</h4>
				<p class="card-category">Complete as informações</p>
			</div>
			<div class="card-body">
				<form method="POST" enctype="multipart/form-data" action="<?php echo BASE_URL; ?>cheque/salvar">            
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Banco</label><br>
									<div class="fileinput-new thumbnail">
										<img src="">
									</div>                            
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label class="bmd-label-floating">Banco</label>
								<select name="chq_banco" id="chq_banco" class="form-control">
									<?php
										echo '<option value="">-- Escolha um Banco --</option>';
										foreach ($bancos as $key => $value) {
											echo '<option value=" '.$value['banco_id'].'">'.$value['banco_nome'].'</option>';
										}									
									?>
									</option>
								</select>     
							</div>
						</div>                
					</div> 
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="bmd-label-floating">Cliente</label>
								<input type="text" class="form-control" name="chq_cliente" value="" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
								<label class="bmd-label-floating">Titular</label>
								<input type="text" class="form-control" name="chq_titular" value="" required>
							</div>
						</div>         							
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label class="bmd-label-floating">Banco</label>
								<input type="text" class="form-control" name="chq_banco" value="" required>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group ">
								<label class="bmd-label-floating">Agência</label>
								<input type="text" class="form-control" name="chq_agencia" value="" required>
							</div>
						</div>         							
						<div class="col-md-3">
							<div class="form-group">
								<label class="bmd-label-floating">Conta</label>
								<input type="text" class="form-control" name="chq_conta" value="" required>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group ">
								<label class="bmd-label-floating">Número do Cheque</label>
								<input type="text" class="form-control" name="chq_num" value="" required>
							</div>
						</div>         							
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="bmd-label-floating">Bom Para</label>
								<input type="text" class="form-control" name="chq_bom_para" value="" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group ">
								<label class="bmd-label-floating">Valor</label>
								<input type="text" class="form-control" name="chq_valor" value="" required>
							</div>
						</div>         							
						<div class="col-md-4">
							<div class="form-group ">
								<label class="bmd-label-floating">Status</label>
								<input type="text" class="form-control" name="chq_status" value="" required>
							</div>
						</div>         							
					</div>
					<button type="submit" class="btn btn-<?php echo $this->color_config['cor_forms']; ?> pull-right" >Cadastrar Cheque</button>
					<div class="clearfix"></div>         
				</form>
			</div>
		</div>
	</div>	
</div>