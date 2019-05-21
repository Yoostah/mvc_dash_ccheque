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
                    <div class="form-group ">
                        <label class="bmd-label-floating">Data</label>
                        <input type="text" class="form-control" name="data" value="<?php echo $feriado['DATA_TXT'] ?>" id="datepicker" required>
                    </div>
                </div>							
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="bmd-label-floating">Tipo</label>
                        <input type="text" class="form-control" name="tipo" value="<?php echo $feriado['fer_tipo'] ?>" required>
                    </div>
                </div>
            </div>	
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Estado</label>
                        <select name="cod_estados" id="cod_estados" class="form-control">
                            <option value="">-- Escolha um Estado --</option>
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
                                <option value="">-- Nenhum Estado selecionado --</option>
                        </select>	  
                    </div>
                </div>						
            </div>
            <div class="row">
                <div class="col-md-12 mt-35">
                    <div class="form-group">
                        <div class="form-group">
                            <label class="bmd-label-floating"> Adicione uma breve descrição do Feriado</label>
                            <textarea class="form-control" rows="5" name="descricao"><?php echo $feriado['fer_descricao'] ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-<?php echo $this->color_config['cor_forms']; ?> pull-right" >Salvar Alterações</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
            <input type="hidden" name="user" value="<?php echo $feriado['fer_usu']; ?>">
            <input type="hidden" name="feriado" value="<?php echo $feriado['fer_id']; ?>">
        </form>
    </div>
</div>

<!--   Core JS Files   -->
<script src="<?php echo BASE_URL; ?>assets/dash/js/core/jquery.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/dash/js/core/bootstrap-material-design.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/dash/js/events.js"></script>
<script src="<?php echo BASE_URL; ?>assets/dash/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/dash/js/material-dashboard.js?v=2.1.0"></script>
<!-- Jquery UI -->
<script src="<?php echo BASE_URL; ?>assets/js/jquery-ui.js"></script>
<script>
    
    $().ready(function () {       

        

        $('#cod_estados').change(function () {
            if ($(this).val()) {
                $('#cod_cidade').hide();
                $('.carregando').show();
                $.getJSON(
                    BASE_URL + 'feriado/selectMun_UF',
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
        
        $('#datepicker').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true,
            showButtonPanel: true,
            changeMonth: true,
            changeYear: true,
            showWeek: true,
            firstDay: 1
        });

        $.datepicker.regional['pt-BR'] = {
            closeText: 'Fechar',
            prevText: '&#x3c;Anterior',
            nextText: 'Pr&oacute;ximo&#x3e;',
            currentText: 'Hoje',
            monthNames: ['Janeiro', 'Fevereiro', 'Mar&ccedil;o', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            dayNames: ['Domingo', 'Segunda-feira', 'Ter&ccedil;a-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sabado'],
            dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
            dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
            weekHeader: 'Sm',
            dateFormat: 'dd/mm/yy',
            firstDay: 0,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };
        $.datepicker.setDefaults($.datepicker.regional['pt-BR']);
        
    });
</script>    
