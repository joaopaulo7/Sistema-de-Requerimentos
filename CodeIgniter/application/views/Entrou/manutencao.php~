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
    	<h1>Sistema de Requerimentos</h1>
    </nav>
			<div class="row">
					<div id="conteudo" class="col-md-6 col-md-offset-3">
       			<?php echo '<form method="POST" action="'.base_url('Entrou/manutencao/alterar').'">'?>
       			 
       			    <?php echo form_error('email'); ?>
       			 	 <?php
       			 	 echo '
          	       <label for="email">
        	          	  Email:
           	     	 </label>
         	       <input type="text" id="email" name="email" value="' .$email. '"><br>
         	       ';
         	       ?>
         	       
         	       <?php echo form_error('outraSenha'); ?>
         	       <label for="outraSenha">
          	          Nova Senha(opicional):
         	       </label>
         	       <input type="password" name="outraSenha" id="outraSenha"><br>
         	       
         	       <?php echo form_error('confsenha'); ?>
         	       <label for="confsenha">
          	          Confirmar Nova Senha:
         	       </label>
         	       <input type="password" name="confsenha" id="confsenha"><br>
         	       
         	       <button type="submit">
         	           Enviar
         	       </button>
         	   </form>
        		 </div>
        	</div>
       	<div class="copyright">
				<div class="col-md-12">
					<p>Grupo Dedicação, Cefet-mg,Varginha &copy; Todos os direitos reservados.</p>
				</div>
			</div>
      </body>
</html>