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
       <?php 
        echo "esse será o menu";
        echo anchor('Entrou/criarFormularioSubstituicao', 'Requerir Substituicao').br();
        echo anchor('Entrou/criarFormularioVisita', 'Requerir Visita').br().br();
        echo anchor('login/logout', 'Logout', 'title="Logout"');
        echo anchor('Entrou/manutencao', 'Manutencao').br().br();
        ?>
    </body>
</html>
