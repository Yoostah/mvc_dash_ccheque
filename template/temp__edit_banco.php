<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/dash/css/font-awesome.min.css">
<div class="card">
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data" action="<?php echo BASE_URL; ?>banco/salvar">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">Código</label>
                        <input type="text" class="form-control" name="banco_cod" value="<?php echo $banco['banco_cod'] ?>" required>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group ">
                        <label class="bmd-label-floating">Nome</label>
                        <input type="text" class="form-control" name="banco_nome" value="<?php echo $banco['banco_nome'] ?>" required>
                    </div>
                </div>							
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Logomarca</label><br>
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput" style="display:block">
                            <div class="fileinput-new thumbnail">
                                <img src="<?php echo BASE_URL.'assets/imagens/'.$banco['banco_logo'].'.png?'.time();?>">
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
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning pull-right" >Salvar Alterações</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		    </div>
            <input type="hidden" name="user" value="<?php echo $banco['banco_usu']; ?>">
            <input type="hidden" name="banco" value="<?php echo $banco['banco_id']; ?>">
            <input type="hidden" name="codigo" value="<?php echo $banco['banco_cod']; ?>">
        </form>
    </div>
</div>

<!--   Core JS Files   -->
<script src="<?php echo BASE_URL; ?>assets/dash/js/core/jquery.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/dash/js/core/bootstrap-material-design.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/dash/js/events.js"></script>
<script src="<?php echo BASE_URL; ?>assets/dash/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/dash/js/material-dashboard.js?v=2.1.0"></script>
<script src="<?php echo BASE_URL; ?>assets/dash/js/jasny-bootstrap.js"></script>
