<div class="jumbotron">
	<h1>Consulta de Cheque</h1>		
</div>
<div class="container">
    <div class="table-wrapper">

        <div class="table">      
            <table class="table" cellspacing="0" id="tech-companies">
            <?php
            //$pdo = _conectaBD();
            //$sql = $pdo->prepare("SELECT cheque.* , bancos.logo FROM cheque LEFT JOIN bancos ON cheque.banco = bancos.codigo WHERE cheque.compensou //= 0 and usu_id = $session_usu_id ORDER BY cheque.data_compensacao");
            //$sql->execute();

            //if ($sql->rowCount() > 0){ ?>
                <thead>
                    <tr>
                        <th class="essential persist"></th>
                        <th>BANCO</th>
                        <th>AG</th>
                        <th>C/C</th>
                        <th class="essential">Nº</th>
                        <th class="essential" style="width: 15%">VALOR</th>
                        <th class="optional">TAXA</th>
                        <th>REC. EM:</th>
                        <th>BOM P/:</th>
                        <th class="essential">DATA COMP:</th>
                        <th>DIAS</th>
                        <th>VALOR CORRIGIDO</th>
                        <th class="essential">CLIENTE</th>
                        <th>TITULAR</th>
                    </tr> 
                </thead>
                <tbody>
                    <tr><?php

                        /*$cheques = $sql->fetchAll();

                        foreach ($cheques as $cheque) {
                        if($cheque['compensado'] != NULL){
                            */?>
                            <!--<td><button class="btn btn-success btn-xs" id="btn_compensou" onclick="location.href='compensar.php?id=<?php //echo $cheque['id'] ?>'">Compensou <img src="_imagens/check_comp2.png"></button></td> -->
                            <?php
                        //}else{
                            ?>
                            <td></td>
                            <?php
                        //}

                        ?>	
                        
                        <td><img src="<?php //echo $cheque['logo'].'.png?'.time() ?>"></td>
                        <td><?php //echo $cheque['agencia'] ?></td>
                        <td><?php //echo $cheque['conta_corrente'] ?></td>
                        <td><?php //echo $cheque['num_cheque'] ?></td>
                        <td style="white-space: nowrap;"><?php //echo 'R$'.number_format($cheque['valor'],2, ',', ' ') ?></td>
                        <td><?php //echo floatval($cheque['taxa'])."%" ?></td>
                        <td><?php //echo date("d/m/Y",strtotime($cheque['recebido_em'])) ?></td>
                        <td><?php //echo date("d/m/Y",strtotime($cheque['bom_para'])) ?></td>

                        <?php
                        //$dtEntrega=date("Y-m-d",strtotime($cheque['data_compensacao'])); 
                        //$hoje = date("Y-m-d"); 

                        //if($dtEntrega == $hoje){
                            echo '<td class="warning">'/*.date("d/m/Y",strtotime($cheque['data_compensacao']))*/.'</td>';
                        //}else if ($dtEntrega < $hoje){
                        //	echo '<td class="success">'.date("d/m/Y",strtotime($cheque['data_compensacao'])).'</td>';
                        //}else{
                        //	echo '<td class="danger">'.date("d/m/Y",strtotime($cheque['data_compensacao'])).'</td>';
                        //}
                        ?>

                        <td><?php //echo $cheque['dias_correcao'] ?></td>
                        <td><?php //echo 'R$'.number_format($cheque['valor_corrigido'],2, ',', ' ') ?></td>
                        <td><?php //echo $cheque['cliente'] ?></td>
                        <td><?php //echo $cheque['titular_cheque'] ?></td>
                    </tr>
                </tbody><?php	
                    //}
            //}else{ ?>
                    <tr>
                        <td colspan="3" align="center" style="font-weight: bold; color: red">Nenhum cheque cadastrado</td>
                    </tr><?php
            //} ?>				
            </table>
        </div>	
    </div>
</div>    	