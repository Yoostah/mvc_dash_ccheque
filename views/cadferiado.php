<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-header card-header-warning">
				<h4 class="card-title">Cadastro de Feriado</h4>
				<p class="card-category">Complete as informações</p>
			</div>
			<div class="card-body">
				<form method="POST" action="<?php echo BASE_URL; ?>feriado/salvar">
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label class="bmd-label-floating">Nome</label>
								<input type="text" class="form-control" name="nome" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group ">
								<label class="bmd-label-floating">Data</label>
								<input type="text" class="form-control" name="data" id="datepicker" required>
							</div>
						</div>						
					</div>
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label class="bmd-label-floating">Tipo</label>
								<input type="text" class="form-control" name="tipo" required>
							</div>
						</div>
					</div>	
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="bmd-label-floating">Estado</label>
								<select name="cod_estados" id="cod_estados" class="form-control">
									<option value="">-- Escolha um Estado --</option>
									<?php
										foreach ($estados as $key => $value) {
											echo '<option value="'.$value['uf_cod'].'">'.$value['uf_nome'].'</option>';
										}									
									?>
									</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="bmd-label-floating">Município</label>
								<select name="cod_cidade" id="cod_cidade" class="form-control" required>
									  <option value="">-- Nenhum Estado selecionado --</option>
								</select>	  
							</div>
						</div>						
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Descrição (opcional)</label>
								<div class="form-group">
									<label class="bmd-label-floating"> Adicione uma breve descrição do Feriado</label>
									<textarea class="form-control" rows="5" name="descricao"></textarea>
								</div>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-warning pull-right" >Cadastrar Feriado</button>
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	</div>	
</div>