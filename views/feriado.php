<?php 
$string = file_get_contents("./feriados.json");
$json = json_decode($string, true);
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
				<p class="card-category">Relação dos Feriados cadastrados</p>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover break-word">
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
								Descrição
							</th>
						</thead>
						<tbody>
							<?php 
								foreach($json as $key => $value){
									echo '<tr>';
									echo '<td>'.$value['date'].'</td>';
									echo '<td>'.$value['name'].'</td>';
									echo '<td>'.$value['type'].'</td>';
									echo '<td>São Paulo</td>';
									echo '<td>'.$value['description'].'</td>';
									echo '</tr>';
								} 
								?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>