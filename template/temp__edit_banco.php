<div class="card">
    <div class="card-body">
        <form method="POST" action="<?php echo BASE_URL; ?>banco/salvar">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="bmd-label-floating">Código</label>
                        <input type="text" class="form-control" name="banco_cod" value="<?php echo $banco['banco_cod'] ?>" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group ">
                        <label class="bmd-label-floating">Nome</label>
                        <input type="text" class="form-control" name="banco_nome" value="<?php echo $banco['banco_nome'] ?>" required>
                    </div>
                </div>							
            </div>
            <div class="row">
                <!-- <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">Logomarca</label>
                        <img src="<?php echo BASE_URL.'assets/imagens/'.$banco['banco_logo'].'.png?'.time();?>">
                        <input type="file" name="logo" id="file" class="custom-file-input" accept=".png">
				        <small id="info" class="form-text text-muted">A logomarca deverá ser um arquivo no formato [.png] e com tamanho 30 x 30px</small>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="nome">Logomarca:</label>
                            <input type="file" name="logo" id="file" class="custom-file-input" accept=".png">
                            <span class="custom-file-control"></span>
                            <small id="fileHelp" class="form-text text-muted" style="color: red"><input type='hidden' id='logoOK' value='1'>A logomarca deverá ser um arquivo no formato [.png] e com tamanho 30 x 30px</small>
                        </label>
                    </div>
                </div> -->
                <div class="col-md-4 col-sm-4">
                    <h4 class="title">Logomarca</h4>
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                            <img src="<?php echo BASE_URL.'assets/imagens/'.$banco['banco_logo'].'.png?'.time();?>">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                        <div>
                            <span class="btn btn-rose btn-round btn-file">
                                <span class="fileinput-new">Selecione uma imagem</span>
                                <span class="fileinput-exists">Alterar</span>
                                <input type="hidden"><input type="file" name="...">
                                <div class="ripple-container"></div>
                            </span>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remover</a>
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
        </form>
    </div>
</div>

<!--   Core JS Files   -->
<script src="<?php echo BASE_URL; ?>assets/dash/js/core/jquery.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/dash/js/core/bootstrap-material-design.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/dash/js/events.js"></script>
<script src="<?php echo BASE_URL; ?>assets/dash/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/dash/js/material-dashboard.js?v=2.1.0"></script>
