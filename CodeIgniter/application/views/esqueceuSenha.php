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
			<div class="row" style="padding:50px;">
					<div id="conteudo" class="col-md-6 col-md-offset-3">
        			<h2>Login</h2>
       			<?php echo '<form method="POST" action="'.base_url('login/mandarEmail').'">'?>
        				 <?php echo $erro; ?><br>
          	       <label style = "color: white;"for="login">
        	          	  Email:
           	     	 </label>
         	       <input type="text" id="email" name="email"><br>
         	       <button type="submit">
         	           Entrar
         	       </button>
         	   </form>
        		 </div>
        	</div>
       	
      </body>
</html>
