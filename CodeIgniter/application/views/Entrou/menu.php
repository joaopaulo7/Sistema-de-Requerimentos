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
        <?php
        echo "esse será o menu";
        echo anchor('Entrou/menu/logout', 'Logout', 'title="Logout"');
        echo anchor('Entrou/criarFormularioSubstituicao', 'Requerir Substituicao');
        echo anchor('Entrou/criarFormularioVisita', 'Requerir Visita');
        echo anchor('Entrou/criarMateria', 'Criar Materia');
        echo anchor('Entrou/criarLocal', 'Criar Local');
        ?>
   </body>
</html>