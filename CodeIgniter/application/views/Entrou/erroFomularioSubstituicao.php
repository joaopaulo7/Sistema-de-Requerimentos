<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Formulario Substuicao Sis.Req</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <form method="POST" action="fazerFormulario">
            
            
				<?php echo form_error('materia'); ?>
                Materia:
					 <select name ="materia" >
							<?php
								foreach($mat as $materia){
									echo "<option value='".$materia->idMateria."'>".$materia->nome."</option>";
								}									 
							?>
					 </select><br>
                
                <?php echo form_error('professor_substituto'); ?>
                Substituto:
					 <select name ="professor_substituto">
							<?php
								foreach($prof as $professor){
									echo "<option value='".$professor->cadastro_identificador."'>".$professor->nome."</option>";
								}									 
							?>
					 </select><br>
                
                
                <?php echo form_error('motivo'); ?>
                <label for="motivo">
                    Motivo:
                </label>
                <input type="text" id="motivo" name="motivo"><br>
                
                
                <!-- O departamento deve ser feio por meio de 
                dropdowns tendo os nomes pré determinados-->
                <?php echo form_error('data_da_substuicao'); ?>
                <label for="data_da_substuicao">
                    Data da substituicao:
                </label>
                <input type="date" id="data_da_substuicao" name="data_da_substuicao"><br>
                
                
                <!-- O horario deve ser feio por meio de 
                dropdowns tendo os nomes pré determinados-->
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
        <br>
        <br>
        <?php echo anchor('Entrou/menu', 'Voltar ao menu', 'Voltar ao menu') ?>
    </body>
</html>
