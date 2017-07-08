<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Cadastro Sis.Req</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <form method="POST" action="criarFormularioVisita/fazerFormulario">
            
            
                Tipo de Visita:
					 <select name='tipo_visita' >
							<option value='Cultural'>Cultural</option>
							<option value='Tecnica'>Tecnica</option>
							<option value='Cientifica'>Cientifica</option>
							<option value='Outro'>Outro</option>
					 </select><br>
                
                Local:
					 <select name='local'>
							<?php
								foreach($local as $localizacao){
									echo "<option value='".$localizacao->idLocal."'>".$localizacao->nome."</option>";
								}									 
							?>
					 </select><br>
                
                
                <?php echo form_error('data'); ?>
                <label for="Data">
                    Data:
                </label>
                <input type="text" id="data" name="data"><br>
                
                
                <?php echo form_error('transporte'); ?>
                <label for="Transporte">
                    Transporte:
                </label>
                <input type="text" id="transporte" name="transporte"><br>
                
                
                <?php echo form_error('horario_saida'); ?>
                <label for="Horario de Saída">
                    Horario de Saída:
                </label>
                <input type="text" id="horario_saida" name="horario_saida"><br>                
                
                
                <?php echo form_error('horario_chegada'); ?>
                <label for="Horario de Chegada">
                    Horario de Chegada:
                </label>
                <input type="text" id="horario_chegada" name="horario_chegada"><br>
                                
                
                <?php echo form_error('local_saida'); ?>
                <label for="Local de Saída">
                    Local de Saída:
                </label>
                <input type="text" id="local_saida" name="local_saida"><br>                
                
                
                <?php echo form_error('local_chegada'); ?>
                <label for="Local de Chegada">
                    Local de Chegada:
                </label>
                <input type="text" id="local_chegada" name="local_chegada"><br>
                
                
                <?php echo form_error('justificativa'); ?>
                <label for="Justificativa">
                    Justificativa:
                </label>
                <input type="text" id="justificativa" name="justificativa"><br>
                
                                
                <?php echo form_error('objetivo_geral'); ?>
                <label for="Objetivo Geral">
                    Objetivo Geral:
                </label>
                <input type="text" id="objetivo_geral" name="objetivo_geral"><br>
                
                                
                <?php echo form_error('objetivo_especifico'); ?>
                <label for="Objetivo Especifico">
                    Objetivo Especifico:
                </label>
                <input type="text" id="objetivo_especifico" name="objetivo_especifico"><br>
                
                
                <?php echo form_error('descricao'); ?>
                <label for="Descricao">
                    Descricao:
                </label>
                <input type="text" id="descricao" name="descricao"><br>
                
                
                <?php echo form_error('avaliacao'); ?>
                <label for="Avaliacao">
                    Avaliacao:
                </label>
                <input type="text" id="avaliacao" name="avaliacao"><br>
                
                
                <button type="submit">
                    Enviar
                </button>
            </form>
        </div>
        <br>
        <br>
        <?php echo anchor('Entrou/menu', 'Voltar ao menu', 'Voltar ao menu') ?>
    </body>
</html>
