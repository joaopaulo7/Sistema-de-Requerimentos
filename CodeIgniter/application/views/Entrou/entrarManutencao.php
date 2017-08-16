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
								<p>Número: <?php echo $dado->cadastro_identificador;?> </p> <br>
								<p>Nome:   <?php echo $dado->nome;?> </p> <br>
								<p>Área:	  <?php echo $dado->area;?> </p> <br>
								<p>Função: <?php echo $dado->funcao;?> </p> <br>
								<p>E-mail: <?php echo $dado->email;?> </p> <br>
								<hr>
							<h1>Alterar dados</h1>
							<?php// echo $erro; ?>
						<?php echo '<form method="POST" action="'.base_url('Entrou/manutencao/entrar').'">'?>
						 
							<?php echo form_error('cadastro_identificador'); ?>
						   <label for="cadastro_identificador">
								  Cadastro Identificador:
							 </label>
						   <input type="text" id="cadastro_identificador" name="cadastro_identificador"><br>
						   
						   
						   <?php echo form_error('senha'); ?>
						   <label for="senha">
							  Senha:
						   </label>
						   <input type="password" name="senha" id="senha"><br>
						   
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
