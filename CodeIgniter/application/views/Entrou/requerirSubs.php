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
            <form method="POST" action="criarFormularioSubstituicao/fazerFormulario">
            
            
                <!-- O materia deve ser feio por meio de 
                dropdowns tendo os nomes pré determinados-->
            	<?php echo form_error('materia'); ?>
                <label for="Materia">
                    Materia a substituir:
                </label>
                <input type="text" id="materia" name="materia"><br>
                
                
                <!-- O professor deve ser feio por meio de 
                dropdowns tendo os nomes pré determinados-->
                <?php echo form_error('professor'); ?>
                <label for="Professor Substituto">
                    Professor Substituto:
                </label>
                <input type="text" id="professor_substituto" name="professor_substituto"><br>
                
                
                <?php echo form_error('motivo'); ?>
                <label for="motivo">
                    Motivo:
                </label>
                <input type="text" id="motivo" name="motivo"><br>
                
                
                <?php echo form_error('data_da_substituicao'); ?>
                <label for="data_da_substituicao">
                    Data da substituicao:
                </label>
                <input type="text" id="data_da_substituicao" name="data_da_substituicao"><br>
                
                
                <?php echo form_error('horario_substituicao'); ?>
                <label for="horario_substituicao">
                    Horario:
                </label>
                <input type="text" id="horario_substituicao" name="horario_substituicao"><br>
                
                
                <button type="submit">
                    Enviar
                </button>
            </form>
        </div>
    </body>
</html>
