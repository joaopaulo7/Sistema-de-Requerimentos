<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Login Sis.Req</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
		<h1>Confirmar?</h1><br>
            <form method="POST" action="">
                <input type="hidden" id="nome" name="nome"><br>   
                <button type="submit">
                    Enviar
                </button>
            </form>
		<?php echo anchor('Entrou/menu', 'Voltar ao menu', 'Voltar ao menu') ?>
    </body>
</html>
