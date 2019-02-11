<div class="jumbotron">
	<h1>Cadastro de Cheque</h1>		
</div>
	<div class="formulario">
		<!--<div style="height: 30px">
			<div>
				<label for="logo">&nbsp;</label>
				<img style="padding-left: 4px;" id="logo" src="">
			</div>
		</div>-->
		<form method="POST">
			<div class="form-row">
				<h2>Dados Cliente</h2>
				<div class="form-group col-md-6">
					<div>
						<label for="cliente">Cliente:</label>
						<input type="text" class="form-control" name="cliente" id="cliente" placeholder="Nome do Cliente">
					</div>
				</div>
				<div class="form-group col-md-6">
					<div>
						<label for="titular">Titular do Cheque (OPCIONAL)</label>
						<input type="text" class="form-control" name="titular" id="titular" placeholder="Titular do Cheque">
					</div>
				</div>	
			</div>
			<div class="form-row">
				<h2>Dados do Cheque</h2>
				<div class="form-group col-md-3">
					<label for="agencia">Banco:</label>	
					<div class="input-group">
						
						<span style="padding: 0px;" class="input-group-addon">
                        	<img  id="logo" >
                        </span>
						<select name="sel_banco" id="sel_banco" class="form-control" onchange="mostrarLogo()">
							<option value="0" disabled selected>Escolha</option>
							<?php
								//$pdo = _conectaBD();
								//$sql = $pdo->prepare("SELECT codigo, nome FROM bancos");
								//$sql->execute();
								//if ($sql->rowCount() > 0) {						            
								//	$bancos = $sql->fetchAll();
								//	foreach ($bancos as $banco) {
								//		$nome = $banco['nome'];
								//		$cod = $banco['codigo'];?>
										<option value="<?php //echo $cod ?>"><?php //echo $nome ?></option><?php
								//	}
								//}	
							?>
						</select>
					</div>
				</div>
				
				<div class="form-group col-md-3">
					<div>
						<label for="agencia">Agência:</label>
						<input type="text" class="form-control" name="agencia" id="agencia" placeholder="Agência">
					</div>
				</div>
				<div class="form-group col-md-3">
					<div>
						<label for="conta">Conta:</label>
						<input type="text" class="form-control" name="conta" id="conta" placeholder="Conta">
					</div>
				</div>
				<div class="form-group col-md-3">
					<div>
						<label for="cheque_num">Número do Cheque:</label>
						<input type="text" class="form-control" id="cheque_num" name="cheque_num" placeholder="Número do Cheque">	
					</div>	
				</div>
				
			</div> <!-- <div form-row> -->
			<div class="form-row">
				<div class="form-group col-md-4">    
				    <div>
				     	<label for="recebido_em">Recebido em:</label>
				     	<input type="date" class="form-control" name="recebido_em" id="recebido_em">   
				    </div>
				</div>
				<div class="form-group col-md-4">    
				    <div>
				     	<label for="bom_para">Bom para:</label>
				     	<input type="date" class="form-control" name="bom_para" id="bom_para">   
				    </div>
				</div>
				<div class="form-group col-md-4">
					<div>
						<label for="cod_comp">Cod. Compensação:</label>
						<select name="cod_comp" id="cod_comp" class="form-control">
							<option id="0" value="0" selected>+0 Dia</option>
							<option id="1" value="1">+1 Dia</option>
							<option id="2" value="2">+2 Dias</option>
							<option id="3" value="3">+3 Dias</option>
							<option id="4" value="4">+4 Dias</option>
						</select>
					</div>
				</div>				
			</div>  <!-- <div form-row> -->	
			<div class="form-row" style="text-align: left">
				<div class="form-group col-md-6">
						<label for="valor">Valor:</label>
					<div class="input-group">				     	
				     	<span class="input-group-addon">R$</span>
				     	<input type="number" class="form-control" name="valor" id="valor" placeholder="Valor do Cheque" onkeydown="javascript: return event.keyCode == 69 ? false : true" step=".01" pattern="^\d+(?:\.\d{1,2})?$">
				    </div>
				</div>			
				<div class="form-group col-md-6">    
				        <label for="taxa">Taxa:</label>
				    <div class="input-group">				     	
				     	<span class="input-group-addon">%</span>  	
				      	<input type="number" class="form-control" name="taxa" id="taxa" placeholder="Taxa de Juros" onkeydown="javascript: return event.keyCode == 69 ? false : true" step=".01" pattern="^\d+(?:\.\d{1,2})?$">  
				    </div>
				</div>
			</div> <!--<div for-row> -->
				
			<div id="form_sim" class="form-row" style="display: none">
				<h2>Simulação</h2>	
				<div class="form-group col-md-3">    
				    <div>
				     	<label for="dias_correcao">
				     		Dias de Correção:<a class="info" onclick="mostrarDetalhes()">
          										<span class="glyphicon glyphicon-info-sign"></span>
        									 </a>
				     	</label>
				     	<input type="text" class="form-control" name="dias_correcao" id="dias_correcao">
				     	
				     	<div id="info-comp" class="form-group" style="display: none">
						    <label for="comment">Detalhes:</label>
						    <textarea class="form-control" rows="5" id="detalhes" style="font-size: .7em;"><?php foreach ($log as $registro) {
						    		echo str_replace('<br>', PHP_EOL, $registro);
						    	}
						    	?>
						    </textarea>
					    </div>   
				    </div>
				</div>
				<div class="form-group col-md-3">
					<div>
				     	<label for="data_comp">Data Compensação:</label>
				     	<input type="date" class="form-control" name="data_comp" id="data_comp">   
				    </div>
				</div>
				<div class="form-group col-md-3">    
						<label for="valor_corrigido">Valor Corrigido:</label>
				    <div class="input-group">				     	
				     	<span class="input-group-addon">R$</span> 	
				     	<input type="number" class="form-control" name="valor_corrigido" id="valor_corrigido" step=".01" pattern="^\d+(?:\.\d{1,2})?$">   
				    </div>				    	
				</div>
				<div class="form-group col-md-3">    
				    
				      	<label for="receita">Receita:</label>
				    <div class="input-group">				     	
				     	<span class="input-group-addon">R$</span>  	
				      	<input type="number" class="form-control" name="receita" id="receita" step=".01" pattern="^\d+(?:\.\d{1,2})?$">  
				    </div>
				    <div class="form-check">
					    <label class="form-check-label" style="font-weight: normal; color: rgba(1,1,1,.3);">
					    	<input id="arredondar" name="arredondar" type="checkbox" class="form-check-input" style="margin-right: 5px;">Arredondar
					    </label>
					</div>
				</div>

			</div> <!-- <div form-row> -->	
			<div class="btn-toolbar pull-right col-md-3">
				<button  style="width: 100%" id="btnSim" class="btn btn-danger pull-right" type="submit" onclick="return simular()">Simular Cheque</button><br><br>
				<button  style="width: 100%" id= "btnCad" class="btn btn-warning pull-right" type="submit" onclick="return cadastrar()">Cadastrar Cheque</button><br><br>
				<!--<button  style="width: 100%" id= "btnCad" class="btn btn-info pull-right" formaction="main.php?func=cadGCheque">Cadastrar Grupo de Cheque</button>-->
			</div>	
			
		<input type="hidden" name="op" id="opcao" value="0">
		<input type="hidden" name="salvar" id="salvar" value="0">	
		</form>
	</div> <!-- <div formulario> -->