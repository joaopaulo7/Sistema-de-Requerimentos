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
            <form method="POST" action="fazerLocal">
                
                
                <!-- O professor deve ser feio por meio de 
                dropdowns tendo os nomes pré determinados-->
                <?php echo form_error('nome'); ?>
                <label for="nome">
                    Nome:
                </label>
                <input type="text" id="nome" name="nome"><br>
                
                
                <?php echo form_error('rua'); ?>
                <label for="rua">
                    Rua:
                </label>
                <input type="text" id="rua" name="rua"><br>
                
                
                <?php echo form_error('numero'); ?>
                <label for="ano">
                    Número:
                </label>
                <input type="text" id="numero" name="numero"><br>
                
                
                <?php echo form_error('bairro'); ?>
                <label for="bairro">
                    Bairro:
                </label>
                <input type="text" id="bairro" name="bairro"><br>
                
                
                <?php echo form_error('cidade'); ?>
                <label for="cidade">
                    Cidade:
                </label>
                <input type="text" id="cidade" name="cidade"><br>
                
                
                <button type="submit">
                    Enviar
                </button>
            </form>
        </div>
    </body>
</html>