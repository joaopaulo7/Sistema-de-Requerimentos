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
        <?php 
        		echo link_tag('Assets/css/bootstrap.min.css');
        		echo link_tag('Assets/css/estilo.css');
        ?>
    </head>
    <body>
    <nav class="navbar navbar-default" role="navigation">
	 	<h1>Sistema de coordenação de visitas técnicas e substituições de professores</h1>
   </nav>
   	<div class="row">
			<div style= "width: 54%;height: 25%;" id="conteudo"class="col-md-8 col-md-offset-1">
			<label style = "color: white; font-size: 26px; padding: 30px;">
                    CADASTRO EFETUADO COM SUCESSO! <br><br>ACEITE A CONFIRMAÇÃO EM SEU E-MAIL.<br><br>
                </label>
                <?php echo anchor('login', '>> Voltar à tela de Login <<') ?>
			</div>
		</div>
    </body>
</html>
