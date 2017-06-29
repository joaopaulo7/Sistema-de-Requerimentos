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
            <form method="POST" action="fazerMateria">
            
                
                <?php echo form_error('nome'); ?>
                <label for="nome">
                    Nome:
                </label>
                <input type="text" id="nome" name="nome"><br>
                
                
                <?php echo form_error('curso'); ?>
                Departamento:
				<select name = "curso">
					 <option value="Geral">Geral</option>
					 <option value="Informática">Informática</option>
 					 <option value="Edificações">Edificações</option>
					 <option value="Mecatrônica">Mecatrônica</option>
				</select><br>
                
                
                <?php echo form_error('ano'); ?>
                <label for="ano">
                    Ano:
                </label>
                <input type="text" id="ano" name="ano"><br>
                
                
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
