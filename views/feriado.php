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
						</thead>
						<tbody>
							<?php 
								foreach($feriados as $key => $value){
									echo '<tr>';
									echo '<td>'.$value['fer_data'].'</td>';
									echo '<td>'.$value['fer_nome'].'</td>';
									echo '<td>'.$value['fer_tipo'].'</td>';
									echo '<td>'.$value['fer_cidade'].'</td>';									
									echo '</tr>';
								} 
								?>
						</tbody>
					</table>
				</div>
			</div>
			
		</div>
		<form>
			<button formaction="<?php echo BASE_URL; ?>feriado/cadastrar" class="btn btn-warning pull-right">Adicionar Feriado</button>			
		</form>		
        <div class="clearfix"></div>
	</div>
</div>
