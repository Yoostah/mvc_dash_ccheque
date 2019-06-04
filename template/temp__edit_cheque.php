<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/dash/css/font-awesome.min.css">
<div class="card">
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data" action="<?php echo BASE_URL; ?>cheque/salvar">            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Banco</label><br>
                            <div class="fileinput-new thumbnail">
                                <img src="<?php echo BASE_URL.'assets/imagens/'.$cheque['banco_logo'].'.png?'.time();?>">
                            </div>                            
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label class="bmd-label-floating">Banco</label>
                        <select name="chq_banco" id="chq_banco" class="form-control">
                            <?php
                                foreach ($bancos as $key => $value) {
                                    $selected = ($value['banco_id'] == $cheque['chq_banco']) ? "selected" : "";
                                    echo '<option value=" '.$value['banco_id'].'" '.$selected.'>'.$value['banco_nome'].'</option>';
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
                        <input type="text" class="form-control" name="chq_cliente" value="<?php echo $cheque['chq_cliente'] ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group ">
                        <label class="bmd-label-floating">Titular</label>
                        <input type="text" class="form-control" name="chq_titular" value="<?php echo $cheque['chq_titular'] ?>" required>
                    </div>
                </div>         							
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="bmd-label-floating">Banco</label>
                        <input type="text" class="form-control" name="chq_banco" value="<?php echo $cheque['chq_banco'] ?>" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group ">
                        <label class="bmd-label-floating">Agência</label>
                        <input type="text" class="form-control" name="chq_agencia" value="<?php echo $cheque['chq_agencia'] ?>" required>
                    </div>
                </div>         							
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="bmd-label-floating">Conta</label>
                        <input type="text" class="form-control" name="chq_conta" value="<?php echo $cheque['chq_conta'] ?>" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group ">
                        <label class="bmd-label-floating">Número do Cheque</label>
                        <input type="text" class="form-control" name="chq_num" value="<?php echo $cheque['chq_num'] ?>" required>
                    </div>
                </div>         							
            </div>         
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning pull-right" >Salvar Alterações</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		    </div>
            <input type="hidden" name="user" value="<?php echo $cheque['chq_usu']; ?>">
            <input type="hidden" name="chq_id" value="<?php echo $cheque['chq_id']; ?>">
            <input type="hidden" name="chq_cod" value="<?php echo $cheque['chq_cod']; ?>">
        </form>
    </div>
</div>

<!--   Core JS Files   -->
<script src="<?php echo BASE_URL; ?>assets/dash/js/core/jquery.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/dash/js/core/bootstrap-material-design.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/dash/js/events.js"></script>
<script src="<?php echo BASE_URL; ?>assets/dash/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/dash/js/material-dashboard.js?v=2.1.0"></script>
