<div class="card">
    <div class="card-body">
        <form method="POST" action="<?php echo BASE_URL; ?>feriado/salvar">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="bmd-label-floating">Nome</label>
                        <input type="text" class="form-control" name="nome" value="<?php echo $feriado['fer_nome'] ?>" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">Data</label>
                        <input type="date" class="form-control" name="data" value="<?php echo $feriado['fer_data'] ?>"required>
                    </div>
                </div>						
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="bmd-label-floating">Tipo</label>
                        <input type="text" class="form-control" name="tipo" value="<?php echo $feriado['fer_tipo'] ?>"required>
                    </div>
                </div>
            </div>	
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Estado</label>
                        <select name="cod_estados" id="cod_estados" class="form-control">
                            <option value=""></option>
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
                                <option value="">-- Escolha um estado --</option>
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
                            <textarea class="form-control" rows="5" name="descricao"><?php echo $feriado['fer_descricao'] ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning pull-right" >Salvar Alterações</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		    </div>
            <input type="text" name="user" value="<?php echo $feriado['fer_usu']; ?>">
            <input type="text" name="feriado" value="<?php echo $feriado['fer_id']; ?>">
        </form>
    </div>
</div>
<script>
    $().ready(function () {       

        

        $('#cod_estados').change(function () {
            if ($(this).val()) {
                $('#cod_cidade').hide();
                $('.carregando').show();
                $.getJSON(
                    'feriado/selectMun_UF',
                    {
                        cod_estados: $(this).val(),
                        ajax: 'true'
                    }, function (j) {
                        var options = '<option value="">-- Selecione uma Cidade --</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' +
                                j[i].cod_cidade + '">' +
                                j[i].nome_cidade + '</option>';
                        }
                        $('#cod_cidade').html(options).show();
                        $('.carregando').hide();
                        $('#cod_cidade').val(<?php echo $feriado['fer_mun_id']; ?>);
                    });
            } else {
                $('#cod_cidade').html(
                    '<option value="">-- Nenhum Estado selecionado --</option>'
                );
            }
        });

        $('#cod_estados').val(<?php echo $feriado['uf_id']; ?>);
        $('#cod_estados').change();
        

        
    });
</script>    
