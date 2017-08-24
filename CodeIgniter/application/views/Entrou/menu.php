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
        <?php 
        		echo link_tag('Assets/css/bootstrap.min.css');
        		echo link_tag('Assets/css/estilo.css');
        ?>
    </head>
    <body>
    <nav class="navbar navbar-default" role="navigation">
	 	<h1>Sistema de coordenação de visitas técnicas e substituições de professores</h1>
   </nav>
       <div class="menu1">
       	 <div id="box" class="col-md-6 col-md-offset-3">
        <?php
        
        echo anchor('Entrou/criarFormularioSubstituicao', 'Requerir Substituição').br();
        echo anchor('Entrou/criarFormularioVisita', 'Requerir Visita').br();
        echo anchor('Entrou/criarMateria', 'Criar Matéria').br();
        echo anchor('Entrou/listagem', 'Listar Formulários').br();
        echo anchor('Entrou/criarLocal', 'Criar Local').br().br();
        echo anchor('Entrou/manutencao', 'Manutencao').br().br();
        echo anchor('Entrou/confirmacoes', 'Confirmações').br().br();
        if($liberaAlt){ echo anchor('Entrou/alterarFuncoes', 'Fazer Alterações').br().br(); }
        echo anchor('Entrou/menu/logout', 'Logout', 'title="Logout"');
        ?>
      </div>
      </div>
      <div class="copyright">
			<div class="col-md-12">
				<p>Grupo Dedicação, Cefet-MG - CAMPUS VIII / Unidade Varginha &copy; Todos os direitos reservados.</p>
		  	</div>
		  </div>
   </body>
</html>
