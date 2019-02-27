<?php 
//$string = file_get_contents("./feriados.json");
//$json = json_decode($string, true);

?>
<style>
	.break-word {
		word-wrap: break-word;
		width: 100%;
		table-layout: fixed;
	}
</style>
<div class="row">
	<div class="col-md-12">
		<div class="card card-plain">
			<div class="card-header card-header-primary">
				<h4 class="card-title">Feriados</h4>
				<p class="card-category">CADFERIADO</p>
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
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</div>
			</div>
			
		</div>
			<a href="<?php echo BASE_URL; ?>feriado/cadastrar">Adicionar Feriados</a>				
        <div class="clearfix"></div>
	</div>
</div>