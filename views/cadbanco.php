<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-header card-header-<?php echo $this->color_config['cor_forms']; ?>">
				<h4 class="card-title">Cadastro de Bancos</h4>
				<p class="card-category">Complete as informações</p>
			</div>
			<div class="card-body">
				<form method="POST" enctype="multipart/form-data" action="<?php echo BASE_URL; ?>banco/salvar">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="bmd-label-floating">Código</label>
								<input type="text" class="form-control" name="banco_cod" required>
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group ">
								<label class="bmd-label-floating">Nome</label>
								<input type="text" class="form-control" name="banco_nome" required>
							</div>
						</div>							
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Logomarca</label><br>
								<div class="fileinput fileinput-new text-center" data-provides="fileinput" style="display:block">
									<div class="fileinput-new thumbnail">
										<img src="<?php echo BASE_URL.'assets/imagens/image_placeholder.jpg';?>">
									</div>
									<div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
									<div>
										<span class="btn btn-rose btn-round btn-file">
											<span class="fileinput-new">Selecione uma imagem</span>
											<span class="fileinput-exists">Alterar</span>
											<input type="file" name="banco_logo" id="file" accept=".png">
											<div class="ripple-container"></div>
										</span>
										<a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput">Remover</a>
										<small id="info" class="form-text text-muted">A logomarca deverá ser um arquivo no formato [.png] e com tamanho 30 x 30px</small>
									</div>
								</div>         
							</div>
						</div>                
					</div>       
					<button type="submit" class="btn btn-<?php echo $this->color_config['cor_forms']; ?> pull-right" >Cadastrar Banco</button>
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	</div>	
</div>